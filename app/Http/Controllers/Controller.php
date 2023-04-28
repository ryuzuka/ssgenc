<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use Carbon\Carbon;
use App\Models\Menu;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\LoginmenuController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // [주의]조건체크 룰
    //--------------------------------------------------------------------------------------------------
    // $condition	            isset($condition)	is_null($condition)	empty($condition)	!!$condition
    //--------------------------------------------------------------------------------------------------
    // $condition;	            false	            true	            true	            Undefined variable
    // $condition = null;	    false	            true	            true	            false
    // $condition = '';	        true	            false	            true	            false
    // $condition = 'string';	true	            false	            false	            true
    // $condition = '0';	    true	            false	            true	            false
    // $condition = 0;	        true	            false	            true	            false
    // $condition = 1;	        true	            false	            false	            true
    // $condition = [];	        true	            false	            true	            false
    // $condition = [1];	    true	            false	            false	            true
    //--------------------------------------------------------------------------------------------------

    const USE_LOGGER            = true;
    const MENU_ENTRY            = 'project';

    const err_default           = 'E000';
    const err_insert_invalid    = 'E001';
    const err_insert_failure    = 'E002';
    const err_delete_failure    = 'E003';
    const err_model_failure     = 'E004';

    const MAIN_PAGE_LIMIT = 5;  //프론트 페이지당 개수
    const PAGE_LIMIT = 10;      //페이지당 개수
    const LOAD_MORE = 6;        //이미지 대칭상 6개 표시.

    private $rollback = false;

    protected $count_main_page = self::MAIN_PAGE_LIMIT;
    protected $count_page = self::PAGE_LIMIT;
    protected $count_more = self::LOAD_MORE;

    // protected $user_id = null;
    protected $model = null;
    protected $model_id = 'id';

    protected $menu_id = 0;
    protected $insert = false;

    public function __construct()
    {
    }

    //---------------------------------------------------
    public function destroy()
    {
        // Log::debug('Controller:: destroy ===> '.$this->user_id);
    }

    //---------------------------------------------------
    public function setModel($model)
    {
        $this->model = $model;
    }

    //---------------------------------------------------
    public function getModel()
    {
        return $this->model;
    }

    //---------------------------------------------------
    public function getUserId()
    {
        return session('user_id');
    }

    //---------------------------------------------------
    public function getLoginIp()
    {
        return session('login_ip');
    }

    //---------------------------------------------------
    public function getLoginAt()
    {
        return session('login_at');
    }

    //---------------------------------------------------
    public function getMenuId()
    {
        $menu = Menu::where('url', $this->clazz)->first();
        if (isset($menu))
        {
            return $menu->menu_id;
        }

        return 0;
    }

    //---------------------------------------------------
    public function getDefaultErrCode($prefix)
    {
        return $prefix.'-'.self::err_default;
    }

    //---------------------------------------------------
    public function getErrCode($err_key)
    {
        $temp = explode('\\', get_class($this));
        // Log::debug('__CLASS__ => ' . __CLASS__);

        $class_nm = end($temp);
        switch($err_key)
        {
            case 'err_insert_invalid': return $class_nm.'-'.self::err_insert_invalid;
            case 'err_insert_failure': return $class_nm.'-'.self::err_insert_failure;
            case 'err_delete_failure': return $class_nm.'-'.self::err_delete_failure;
        }

        return '';
    }

    //---------------------------------------------------
    public function aes_encrypt($val)
    {
        $encrypted = null;

        try
        {
            $encrypted = Crypt::encryptString($val);
        }
        catch (EncryptException $e)
        {
            $encrypted = $val;
        }

        return $encrypted;
    }

    //---------------------------------------------------
    public function aes_decrypt($val)
    {
        $decrypted = null;

        try
        {
            $decrypted = Crypt::decryptString($val);
        }
        catch (DecryptException $e)
        {
            $decrypted = $val;
        }

        return $decrypted;
    }

    //---------------------------------------------------
    public function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('PROXY_ADD_X_FORWARDED_FOR'))
            $ipaddress = getenv('PROXY_ADD_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    //---------------------------------------------------
    function is_base64($s)
    {
        return (bool) preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s);
    }

    //---------------------------------------------------
    public function checkSession(Request $request)
    {
        // if ( !$request->session()->exists('user_id') )
        // {
        //     $code = 'E008';
        //     return $this->handle_error($code, __('auth.'.$code));
        // }

        return null;
    }

    //---------------------------------------------------
    // $page     => 현재 페이지
    // $total    => 전체개수
    // 페이지가 더 있는지 체크한다.
    public function hasMore($page, $total)
    {
        $max_page = ($total / self::LOAD_MORE);
        if ($total % self::LOAD_MORE > 0)
        {
            $max_page++;
        }

        return ($page == $max_page)? 0 : 1;
    }

    //---------------------------------------------------
    public function checkFrom($request)
    {
        return isset($request['from'])?$request['from']:'1900-01-01';
    }

    //---------------------------------------------------
    public function checkTo($request)
    {
        return isset($request['to'])?$request['to']:date('Y-m-d', strtotime(Carbon::now()->addDay()));
    }

    //---------------------------------------------------
    public function checkDefault($request, $key, $default)
    {
        return isset($request[$key])?$request[$key]:$default;
    }

    //---------------------------------------------------
    public function getDefaultDate($request, $key, $val)
    {
        return isset($request[$key])?$request[$key]:date('Y-m-d H:i:s', strtotime($val));
    }

    //---------------------------------------------------
    public function getLanguage()
    {
        $lang = session('applocale');
        if(!isset($lang))
        {
            $lang = App::getLocale();
        }

        return $lang;
    }

    //---------------------------------------------------
    public function handleResponse($result, $msg)
    {
        $res = [
            'success' => true,
            'message' => $msg,
            'data'    => $result
        ];
        return response()->json($res, 200, JSON_UNESCAPED_UNICODE);
    }

    //---------------------------------------------------
    public function handleError($error, $errorMsg = [], $code = 404)
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMsg)){
            $res['data'] = $errorMsg;
        }
        return response()->json($res, $code, JSON_UNESCAPED_UNICODE);
    }

    //---------------------------------------------------
    function handle_ok($message, $data='')
    {
        return response()->json([
            'code'      => '0000',
            'message'   => $message,
            'data'      => $data
        ], JSON_UNESCAPED_UNICODE);
    }

    //---------------------------------------------------
    function handle_error($code, $message, $data='')
    {
        return response()->json([
            'code'      => $code,
            'message'   => $message,
            'data'      => $data
        ], JSON_UNESCAPED_UNICODE);
    }

    //-------------------------------------------
    public function fileDelete(Request $request)
    {
        $result = false;
        if (isset($request->attach_id) && $request->attach_id>0)
        {
            $result = (new FileController)->delete($request->attach_id);
        }

        if (isset($request->image_id) && $request->image_id>0)
        {
            $result = (new FileController)->delete($request->image_id);
        }
        return $result;
    }

    //-------------------------------------------
    public function attachClear($attach_id)
    {
        $result = false;
        if (isset($attach_id) && $attach_id>0)
        {
            $result = (new FileController)->delete($attach_id);
        }

        return $result;
    }

    //---------------------------------------------------
    public function beginTransaction()
    {
        DB::beginTransaction();
        $this->rollback = true;
    }

    //---------------------------------------------------
    public function commit()
    {
        $this->rollback = false;
    }

    //---------------------------------------------------
    public function endTransaction()
    {
        if ( !$this->rollback )
        {
            DB::commit();
        }
        else
        {
            DB::rollback();
        }

        $this->rollback = false;
    }

    //-------------------------------------------
    public function logger_select()
    {
        if(self::USE_LOGGER)
        {
            (new LoginmenuController)->writLog($this->getMenuId(), session('menu_url'), '조회');
        }
    }

    //-------------------------------------------
    public function logger_update()
    {
        if(self::USE_LOGGER)
        {
            (new LoginmenuController)->writLog($this->getMenuId(), session('menu_url'), '수정');
        }
    }

    //-------------------------------------------
    public function logger_insert()
    {
        if(self::USE_LOGGER)
        {
            (new LoginmenuController)->writLog($this->getMenuId(), session('menu_url'), '등록');
        }
    }

    //-------------------------------------------
    public function logger_delete()
    {
        if(self::USE_LOGGER)
        {
            (new LoginmenuController)->writLog($this->getMenuId(), session('menu_url'), '삭제');
        }
    }

    //-------------------------------------------
    public function logger($menu_act, $refId = null)
    {
        if(self::USE_LOGGER)
        {
            (new LoginmenuController)->writLog($this->getMenuId(), session('menu_url'), $menu_act, $refId);
        }
    }

    //-------------------------------------------
    public function checkMenuAuth($type=null, $isIndex = false)
    {
        //현재 로그인 사용자가 해댱 메뉴의 권한이 있는지 체크해서 없다면
        //기본 메뉴로 되돌린다.
        //[주의]반드시 Controller index 실행전에 넣고,
        //이 매소드는 Controller index에 넣으면 절대 안됨(무한 리다이렉트 됨).
        $url = null;
        if(isset($type))
        {
            $url = $this->clazz.'?type='.$type;
        }
        else
        {
            $url = $this->clazz;
        }

        //세션에 저장해야 제대로 된다.
        session(['menu_url' => $url]);
        if ($isIndex) return;

        $ret = (new AccessController)->hasAccess($url);
        if ($ret == 'N')
        {
            // Log::debug('메뉴권한이 없음 ===============> '.$this->clazz );
            return redirect()->route(self::MENU_ENTRY)->send();
        }
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $this->logger_select();
    }

    //-------------------------------------------
    public function upload(Request $request)
    {
        if ( empty($this->model) )
        {
            return $this->handle_error(self::err_model_failure, '모델객체가 설정되지 않았습니다.');
        }

        $r = $request->input();

        $data = json_decode($r['data'], true);

        $validator = Validator::make($data, $this->rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        $item = null;
        $attach_id = 0;

        try
        {
            $this->uploadBefore($request);

            //기본적으로 모든 로컬 입력 키는 id로 통일 됨
            //[주의] 메뉴의 경우, menu_id가 키 이지만, 프론트에서 id로 통일하고
            //       서버에서 처리 됨(테이블 구성시 id키가 조인시 중복되어 이름을 변경 함).
            $id = $data['id'];
            if ( !empty($id) )
            {
                $this->insert = false;

                $item = $this->model::find($id);

                if(isset($item))
                {
                    if ( isset($item->attach_id) )
                    {
                        $request['file_id'] = $item->attach_id;
                        $attach_id = (new FileController)->update($request);
                        if ($attach_id < 0)
                        {
                            $message = (new FileController)->getErrMsg($attach_id, $request);
                            return $this->handle_error(self::err_insert_failure, $message);
                        }

                        if ($attach_id > 0)
                        {
                            $item->attach_id = $attach_id;
                        }
                        $data['attach_id'] = $attach_id;
                    }

                    if (isset($data['updated_id']) || Schema::hasColumn($this->table, 'updated_id'))
                    {
                        $data['updated_id'] = $this->getUserId();
                    }

                    $this->logger_update();
                }
            }
            else
            {
                $this->insert = true;

                $item = new $this->model;
                $id = $this->model::max($this->model_id);
                if ( !isset($id) )
                {
                    $id = 1;
                }
                else
                {
                    $id++;
                }

                $data[$this->model_id] = $id;

                if (isset($data['project_yn']) && $data['project_yn'] == 'Y')
                {
                    //프로젝트 진행중일 경우
                    //시작일과 동일하게 설정한다.
                    $data['to'] = $data['from'];
                }

                if (isset($data['from']))
                {
                    $str = $data['from'];
                    if( preg_match("/^[0-9]{4}.(0[1-9]|1[0-2])$/", $str) )
                    {
                        $str = $data['from'].'.01';
                    }
                    else if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])$/", $str) )
                    {
                        $str = $data['from'].'-01';
                    }

                    $data['from'] = $str;
                }

                if (isset($data['to']))
                {
                    $str = $data['to'];
                    if( preg_match("/^[0-9]{4}.(0[1-9]|1[0-2])$/", $str) )
                    {
                        $str = $data['to'].'.01';
                    }
                    else if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])$/", $str) )
                    {
                        $str = $data['to'].'-01';
                    }

                    $data['to'] = $str;
                }

                // if (isset($data['registed_at']))
                // {
                //     //프로젝트 진행중일 경우
                //     //시작일과 동일하게 설정한다.
                //     $data['registed_at'] = $this->getDefaultDate($request, 'registed_at', $data['registed_at']);
                // }

                if (isset($data['attach_id']) || Schema::hasColumn($this->table, 'attach_id'))
                {
                    $attach_id = (new FileController)->insert($request);
                    if ($attach_id < 0)
                    {
                        $message = (new FileController)->getErrMsg($attach_id, $request);
                        return $this->handle_error(self::err_insert_failure, $message);
                    }

                    $item->attach_id = $attach_id;
                    $data['attach_id'] = $attach_id;
                }

                if (isset($data['created_id']) || Schema::hasColumn($this->table, 'created_id'))
                {
                    $data['created_id'] = $this->getUserId();
                }

                if (isset($data['updated_id']) || Schema::hasColumn($this->table, 'updated_id'))
                {
                    $data['updated_id'] = $this->getUserId();
                }

                $this->logger_insert();
            }

            $item->fill($data);
            if ( isset($item->created_id) )
            {
                $item->created_id = $this->getUserId();
            }
            if ( isset($item->updated_id) )
            {
                $item->updated_id = $this->getUserId();
            }
            $item->save();

            $this->uploadAfter($request);

            $this->commit();
        }
        catch(QueryException $e)
        {
            $this->attachClear($attach_id);

            $message = '등록에 실패했습니다.';
            $ret = env('SQL_DEBUG_LOG');
            if ($ret == true)
            {
                $message = $e->getMessage();
            }

            return $this->handle_error(self::err_insert_failure, $message);
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok("등록되었습니다.");
    }

    //-------------------------------------------
    public function uploadBefore(Request $request)
    {
        //오버라이딩 해서 구현.
    }

    //-------------------------------------------
    public function uploadAfter(Request $request)
    {
        //오버라이딩 해서 구현.
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
                //첨부파일이 존재하는 경우
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $result = (new FileController)->delete($item->attach_id);
                }

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    $this->logger_delete();
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
                //첨부파일이 존재하는 경우
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $result = (new FileController)->delete($item->attach_id);
                    if($result <= 0)
                    {
                        return $this->handle_error(self::err_delete_failure, '삭제되지 않았습니다.');
                    }
                }

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    $this->logger_delete();
                    return $this->handle_ok('삭제되었습니다.');
                }

                return $this->handle_error(self::err_delete_failure, '삭제되지 않았습니다.');
            }
        }

        return $this->handle_error(self::err_delete_failure, '삭제할 항목이 없습니다.');
    }

    //-------------------------------------------
    //마지막 첨부파일이 삭제되면, attch_id를 삭제한다.
    public function deleteAttach(Request $request)
    {
        if ( empty($this->model) )
        {
            return $this->handle_error(self::err_model_failure, '모델객체가 설정되지 않았습니다.');
        }

        //항목 삭제
        $r = $request->input();

        $id = $r[$this->model_id];
        $item = null;
        if ( isset($id) )
        {
            $item = $this->model::find($id);
            if( isset($item) )
            {
                //첨부파일이 존재하는 경우
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $item->attach_id = 0;
                    $item->save();
                }
            }
        }

        return $this->handle_ok('첨부파일 정보 삭제.');
    }

    //-------------------------------------------
    public function getLeftMenu()
    {
        return (new MenuController)->getAccessMenuList();
    }
}
