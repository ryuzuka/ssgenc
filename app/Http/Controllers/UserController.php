<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Part;
use App\Models\User;
use App\Models\Access;
use App\Models\Logins;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuController;
use ESolution\DBEncryption\Encrypter;

class UserController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'user';
    const __TABLE__ = 'users';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const PART_NM    = "(SELECT part_nm FROM parts WHERE part_id=T.part_id) AS part_nm";
    const LOGIN_MENU = "(SELECT B.MENU_NM FROM loginmenus A LEFT JOIN menus B ON B.MENU_ID=A.MENU_ID WHERE A.user_id=T.user_id ORDER BY A.CREATED_AT DESC LIMIT 1) AS menu_nm";
    const LOGIN_IP   = "(SELECT A.LOGIN_IP FROM logins A WHERE A.user_id=T.user_id ORDER BY A.CREATED_AT DESC LIMIT 1) AS login_ip";

    public static $user_name;

    private $default_err_code;

    protected $rules =
        [
            'name' => 'required',
            'id' => 'required', //편의상 user_id를 id로 처리함.
            'email' => 'required',
            'part_id' => 'required',
            'useflag' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\User');
    }

    //-------------------------------------------
    public function checkUserId(Request $request)
    {
        $ret = false;
        $user = null;

        try
        {
            $r = $request->input();

            $id = $r['id'];
            if ( isset($id) )
            {
                $user = User::find($id);
                if (isset($user))
                {
                    $ret = true;
                }
            }
        }
        catch(Exception $e)
        {
            return $this->handle_error(self::err_insert_failure, $e->getMessage());
        }

        if ($ret == true)
        {
            return $this->handle_ok("이미 사용자가 존재 합니다.", ['user_id'=>$user->user_id]);
        }

        return $this->handle_ok("사용자가 유효합니다.", ['user_id'=>null]);
    }

    //-------------------------------------------
    public function enableUser(Request $request)
    {
        $this->beginTransaction();

        try
        {
            $r = $request->input();

            $id = $r['id'];
            if ( isset($id) )
            {
                $user = User::find($id);
                if (isset($user))
                {
                    $user->login_at = now();
                    $user->login_fail_cnt = 0;
                    $user->useflag = 'Y';
                    $user->save();
                    $this->commit();

                    $this->logger('계정활성화변경', $r['id']);
                }
            }
        }
        catch(Exception $e)
        {
            return $this->handle_error(self::err_insert_failure, $e->getMessage());
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok("사용자가 활성화되었습니다.");
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        //반드시 부모 실행전에 넣고,
        //이 매소드는 상위의 index에 넣으면 절대 안됨.
        $this->checkMenuAuth(null, true);

        parent::index($request);

        return $this->getList($request);
    }

    //-------------------------------------------
    public function show(User $user)
    {
        return new UserResource($user);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();
        $where = array();
        $find_key = null;
        if (isset($r['user_find_key']) && $r['user_find_key'] != '00')
        {
            //user_id, name 검색 선택
            $find_key = $r['user_find_key'];
        }

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $q = DB::table(DB::raw($this->table.' T'))
            ->select(
                'T.name as name',
                'T.user_id as user_id',
                DB::raw(self::PART_NM),
                DB::raw(self::LOGIN_MENU),
                DB::raw(self::LOGIN_IP),
                'T.login_at as login_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('T.created_at', [$from, $to]);

        if (isset($searchText))
        {
            //제목 키워드
            if (isset($find_key))
            {
                $q = $q->where(($find_key == '01')?'T.user_id':'T.name', 'LIKE', '%'.$searchText.'%');
            }
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                ->orderBy('T.created_at', 'desc')
                ->paginate(self::PAGE_LIMIT)
                ->appends(request()->except('page'));
        if(isset($items))
        {
            foreach($items as $item)
            {
                $item->name = Encrypter::decrypt($item->name);
            }
        }

        $items_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_user_find_key = DB::table('codes')->where(['codegroup_id' => 'user_find_key'])->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_user_find_key' => $items_user_find_key,
            'items_count' => $items_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();

        $item = null;
        $menus_access = null;

        $id = $r['id'];
        if ( isset($id) )
        {
            $item = User::find($id);
            if (isset($item))
            {
                $user = User::find($item->created_id);
                if ( isset($user) )
                {
                    $item->created_id = $user->name;

                    $user = User::find($item->updated_id);
                    $item->updated_id = $user->name;

                    $this->logger('['.$id.']사용자조회');
                }

                $menus_access = Access::where('access_id', $item->access_id)->get();
            }
        }

        //공통코드 조회
        $items_user_types   = DB::table('codes')->where(['codegroup_id' => 'user_type'])->get();
        $items_states       = DB::table('codes')->where(['codegroup_id' => 'states'])->get();
        $items_parts        = Part::where(['useflag'=>'Y'])->get();

        foreach($items_parts as $it)
        {
            $it->{"code_id"} = $it->part_id;
            $it->{"code_nm"} = $it->part_nm;
        }

        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'edit' => ( isset($r['id']) )? true : false,
            'cat_project'   => (new MenuController)->getItems('프로젝트 관리'),
            'cat_board'     => (new MenuController)->getItems('게시판 관리'),
            'cat_cust'      => (new MenuController)->getItems('고객상담 관리'),
            'cat_site'      => (new MenuController)->getItems('사이트 관리'),
            'admin_site'    => (new MenuController)->getItems('관리자 관리'),
            'items_user_types'  => $items_user_types,
            'items_states'  => $items_states,
            'items_parts'  => $items_parts,
            'menus_access' => $menus_access,
            'item' => $item
        ]);
    }

    //-------------------------------------------
    //선택된 복수개의 항목을 삭제.
    public function deletes(Request $request)
    {
        if ( empty($this->model) )
        {
            return $this->handle_error(self::err_model_failure, '모델객체가 설정되지 않았습니다.');
        }

        $r = $request->input();

        $ids = $r['id'];
        if ( !empty($ids) )
        {
            foreach($ids as $id)
            {
                $this->deleteRow($id);
            }
        }

        return $this->handle_ok('삭제되었습니다.');
    }

    //-------------------------------------------
    public function deleteRow($id)
    {
        if ( !empty($id) )
        {
            $item = $this->model::find($id);
            if( isset($item) )
            {
                //권한 삭제하기
                $result = (new AccessController)->delete($item->access_id);

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    //$this->logger_delete();
                    $this->logger('['.$id.']삭제');
                    return true;
                }

                return false;
            }
        }

        return false;
    }

    //-------------------------------------------
    public function delete(Request $request)
    {
        if ( empty($this->model) )
        {
            return $this->handle_error(self::err_model_failure, '모델객체가 설정되지 않았습니다.');
        }

        //항목 삭제
        $r = $request->input();

        $id = $r[$this->model_id];
        if ( !empty($id) )
        {
            $item = $this->model::find($id);
            if( isset($item) )
            {
                //권한 삭제하기
                $result = (new AccessController)->delete($item->access_id);

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    $this->logger('['.$id.']삭제');
                    return $this->handle_ok('삭제되었습니다.');
                }

                return $this->handle_error(self::err_delete_failure, '삭제되지 않았습니다.');
            }
        }

        return $this->handle_error(self::err_delete_failure, '삭제할 항목이 없습니다.');
    }

    //-------------------------------------------
    public function upload(Request $request)
    {
        $r = $request->input();

        $data = json_decode($r['data'], true);

        $validator = Validator::make($data, $this->rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        $item = null;

        try
        {
            //사용자 id => user_id는 무조건 존재 함.
            $id = $data['id'];
            if ( isset($id) )
            {
                $item = User::find($id);
                if (isset($item))
                {
                    $modify = false;

                    $password = $data['password'];
                    if(isset($item->password) && empty($password))
                    {
                        $data['password'] = $item->password;
                    }
                    else
                    {
                        if ($item->password != $password)
                        {
                            $this->logger('비밀번호변경', $id);
                            $modify = true;
                        }
                    }

                    if ($item->part_id != $data['part_id'])
                    {
                        $this->logger('['.$id.']소속변경');
                        $modify = true;
                    }

                    if ($item->email != $data['email'])
                    {
                        $this->logger('이메일주소변경', $id);
                        $modify = true;
                    }

                    if ($item->email_yn != $data['email_yn'])
                    {
                        if ($data['email_yn'] == 'Y')
                        {
                            $this->logger('['.$id.']메일알림받기 사용');
                        }
                        else
                        {
                            $this->logger('['.$id.']메일알림받기 해제');
                        }
                        $modify = true;
                    }

                    if ($item->expired_at != $data['expired_at'])
                    {
                        $this->logger('['.$id.']권한만료일자변경');
                        $modify = true;
                    }

                    if ($item->useflag != $data['useflag'])
                    {
                        // $this->logger('['.$id.']상태변경');
                        if ($item->useflag == 'Y')
                        {
                            $this->logger('['.$id.']상태사용변경');
                        }
                        else
                        {
                            $this->logger('['.$id.']상태중지변경');
                        }
                        $modify = true;
                    }

                    if ($item->reason != $data['reason'])
                    {
                        $this->logger('['.$id.']사유변경');
                        $modify = true;
                    }

                    if ($modify == false)
                    {
                        $this->logger('['.$id.']사용자정보수정');
                    }
                }
                else
                {
                    $item = new User();

                    $id = $data['id'];
                    $data['user_id'] = $id;
                    $data['password_reset_yn'] = 'Y';

                    $item->login_at = now();

                    $this->logger('['.$id.']신규등록');
                }
            }
            else
            {
                return $this->handle_error(self::err_insert_failure, '사용자id가 없습니다.');
            }

            $expired_at = strtotime($data['expired_at']);
            $data['expired_at'] = date('Y-m-d', $expired_at);

            $password_next = strtotime($data['password_next']);
            $data['password_next'] = date('Y-m-d', $password_next);

            $menus = array_merge(
                $data['menu_projects'],
                $data['menu_boards'],
                $data['menu_custs'],
                $data['menu_sites'],
                $data['menu_admins']
            );

            $access_id = (new AccessController)->store($id, $data['reason'], $data['approved_id'], $menus);
            $data['access_id'] = $access_id;

            $item->fill($data);
            $item->created_id = $this->getUserId();
            $item->updated_id = $this->getUserId();
            $item->save();

            $this->commit();
        }
        catch(Exception $e)
        {
            return $this->handle_error(self::err_insert_failure, $e->getMessage());
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok("등록되었습니다.");
    }

    // /**
    //  * 패스워드 변경 알림
    //  */
    // public function PwdChgAlert(Request $request)
    // {
    //     return;
    // }

    // /**
    //  * 패스워드 변경 30일 연장
    //  */
    // public function ExtendPwdChg(Request $request)
    // {
    //     return;
    // }

    //-------------------------------------------
    public function changePassword(Request $request)
    {
        return view('admin.login.pwd_chg')->with([
            'menus' => $this->getLeftMenu()
        ]);
    }

    /**
     * 패스워드 변경
     */
    public function PwdChg(Request $request)
    {
        $params = $request->only(['user_id', 'currentPassword', 'newPassword']);

        // Log::debug(">>>>>> params => ".json_encode($params));

        //base64 포맷 체크
        if (
            // !$this->is_base64($params['user_id']) ||
            !$this->is_base64($params['currentPassword']) ||
            !$this->is_base64($params['newPassword']) )
        {
            return $this->handle_error('E998', '입력 데이터가 잘못되었습니다.');
        }

        // $user_id = base64_decode($params['user_id']);
        $user_id = $params['user_id'];
        $currentPassword = $params['currentPassword'];
        $newPassword = $params['newPassword'];

        $user = User::where(['user_id'=>$user_id, 'password'=>$currentPassword])->first();
        if ( !empty($user) )
        {
            //[주의]클라이언트에서 sha256으로 전달 된다.
            $user->password = $newPassword;
            $user->password_next = now();
            $user->password_reset_yn = 'N';
            $user->save();

            $this->logger('비밀번호변경');

            return $this->handle_ok('비밀번호가 변경되었습니다.');
        }

        return $this->handle_error('E999', '비밀번호 변경에 실패했습니다.');
    }

    /**
     * 로그인 정보 팝업 => 패스워드 변경공지
     */
    public function LoginInfoPopup(Request $request)
    {
        $login_at = null;
        $login_ip = null;

        $user_id = session()->get('user_id');
        if ( isset($user_id) )
        {
            $user = User::find($user_id);
            if ( isset($user) )
            {
                $logins = Logins::where(['user_id'=>$user->user_id])
                            ->orderBy('in_time','DESC')->first();

                $login_at = $user->login_at;
                $login_ip = $logins->login_ip;
            }
        }
        return view('admin.login.login_info_popup', [
            'login_at'=>$login_at,
            'login_ip'=>$login_ip]);
    }

    /**
     * 임시 비밀번호 생성
     */
    public function PwdGen(Request $request)
    {
        $params = $request->only(['user_id']);

        $randomString = $this->passwordGenerator(8);
        // Log::debug('randomString => '.$randomString);

        $user = User::find($params['user_id']);
        if (!empty($user))
        {
            $user->setPassword($randomString);
            $user->password_next = now();
            $user->password_reset_yn = 'Y';
            $user->save();

            $this->logger('['.$user->user_id.']비밀번호재발급');
        }

        $data = [
            'user_id' => $params['user_id'],
            'password' => $randomString
        ];

        return $this->handle_ok('임시비밀번호가 생성되었습니다.', $data);
    }

    //-------------------------------------------
    public function PwdGenPage(Request $request)
    {
        $params = $request->only(['user_id']);
        // Log::debug('params => '.json_encode($params));

        $randomString = $this->passwordGenerator(8);
        // Log::debug('randomString => '.$randomString);

        $data = [
            'user_id' => $params['user_id'],
            'password' => $randomString,
            'url_login' => URL::to('/login')
        ];

        return view('admin.login.pwd_gen', $data);
    }

    //-------------------------------------------
    public function getPwdGenHtml(Request $request)
    {
        $params = $request->only(['user_id']);
        // Log::debug('params => '.json_encode($params));

        $randomString = $this->passwordGenerator(8);
        Log::debug('randomString => '.$randomString);

        $user = User::find($params['user_id']);
        if (!empty($user))
        {
            $user->setPassword($randomString);
            $user->password_next = now();
            $user->password_reset_yn = 'Y';
            $user->save();
        }

        $data = [
            'user_id' => $params['user_id'],
            'password' => $randomString,
            'url_login' => URL::to('/login')
        ];

        $html = view('admin.login.pwd_gen', $data)->render();
        return $html;
    }

    //-------------------------------------------
    public function sendMailWithPwdGenHtml(Request $request)
    {
        $params = $request->only(['user_id']);
        // Log::debug('params => '.json_encode($params));

        $content = null;
        $user = User::find($params['user_id']);
        if (isset($user))
        {
            $content = $this->getPwdGenHtml($request);
            if (isset($content))
            {
                $login_user = User::find($this->getUserId());
                if (isset($login_user))
                {
                    $request['from'] = $login_user->email;
                    $request['from_nm'] = $login_user->name;
                }
                else
                {
                    $request['from'] = env('ORACLE_MAIL_ADMIN');
                    $request['from_nm'] = "관리자";
                }

                $request['to'] = $user->email;
                $request['to_nm'] = $user->name;
                $request['subject'] = "임시 비밀번호 변경 알림";
                $request['content'] = $content;

                $this->logger('['.$user->user_id.']비밀번호재발급');

                //메일전송
                return (new MailController)->sendmail($request);
            }
        }

        return $this->handle_error('E999', '임시 비밀번호 변경에 실패했습니다.');
    }

    //-------------------------------------------
    public function passwordGenerator( $length=12 )
    {
        $counter = ceil($length/4);
        // 0보다 작으면 안된다.
        $counter = $counter > 0 ? $counter : 1;

        $charList = array(
                        array("0", "1", "2", "3", "4", "5","6", "7", "8", "9", "0"),
                        array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"),
                        array("!", "@", "#", "%", "^", "&", "*")
                    );
        $password = "";
        for($i = 0; $i < $counter; $i++)
        {
            $strArr = array();
            for($j = 0; $j < count($charList); $j++)
            {
                $list = $charList[$j];

                $char = $list[array_rand($list)];
                $pattern = '/^[a-z]$/';
                // a-z 일 경우에는 새로운 문자를 하나 선택 후 배열에 넣는다.
                if( preg_match($pattern, $char) ) array_push($strArr, strtoupper($list[array_rand($list)]));
                array_push($strArr, $char);
            }

            // 배열의 순서를 바꿔준다.
            shuffle( $strArr );

            // password에 붙인다.
            for($j = 0; $j < count($strArr); $j++) $password .= $strArr[$j];
        }

        // 길이 조정
        return substr($password, 0, $length);
    }

    //-------------------------------------------
    public function Deploy(Request $request)
    {
        return view(self::__PKG__.'admin.deploy')->with([
            'menus' => $this->getLeftMenu()
        ]);
    }
}
