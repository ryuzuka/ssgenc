<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Part;
use App\Models\User;
use App\Models\Access;
use App\Models\Logins;
use App\Models\LoginMenu;
use Illuminate\Http\Request;
use App\Exports\LoginmenuExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AccessController;

class LoginmenuController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'loginmenu';
    const __TABLE__ = 'loginmenus';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';

    public function __construct()
    {
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $this->checkMenuAuth(null, true);

        parent::index($request);

        return $this->getList($request);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        $items      = null;
        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $find_key = null;
        if (isset($r['user_find_key']) && $r['user_find_key'] != '00')
        {
            //user_id, name 검색 선택
            $find_key = $r['user_find_key'];
        }

        $where = array();

        $q = DB::table($this->table);
        $q = $q->select(
          'id',
          'user_id',
          'menu_nm',
          'menu_act',
          'login_ip',
          'login_at',
          'created_at',
          'ref_id'
        );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if (isset($searchText))
        {
            $users = null;

            if (isset($find_key))
            {
                //아이디(01), 사용자명(02)
                if ($find_key == '01')
                {
                    //검색 키워드의 사용자 아이디 또는 이름을 like로 찾아서, 권한키를 가지고 온다음 검색해야 함.
                    $users = User::where('user_id', 'like', '%'.$searchText.'%')
                            ->where('useflag', 'Y')->select('user_id')->get();
                }
                else
                {
                    $users = User::where('name', 'like', '%'.$searchText.'%')
                            ->where('useflag', 'Y')->select('user_id')->get();
                }
            }

            if (isset($users))
            {
                $q = $q->whereIn('user_id', $users);
            }
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                ->orderBy('created_at', 'desc')
                ->paginate(self::PAGE_LIMIT)
                ->appends(request()->except('page'));
        $items_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_user_find_key = DB::table('codes')->where(['codegroup_id' => 'user_find_key'])->get();

        foreach($items as $item)
        {
            if (isset($item))
            {
                $user = User::find($item->user_id);
                if (isset($user))
                {
                    $item->{"name"} = $user->name;
                    $menu = Menu::where(['url'=>$item->menu_nm])->first();
                    if (isset($menu))
                    {
                        $item->{"org_menu_nm"} = $menu->menu_nm;
                    }

                    $part = Part::find($user->part_id);
                    if(isset($part))
                    {
                        $item->{"part_nm"} = $part->part_nm;
                    }
                }
            }
        }

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_user_find_key' => $items_user_find_key,
            'items_count' => $items_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    // public function export(LoginmenuExport $export)
    // {
    //     //LoginmenuExport에 조인 쿼리 작성 필요.
    //     //화면에서 조회된 결과 객체를 넘겨서 출력한다.
    //     // Route::get('/log-download/{items?}','LoginmenuController@download')->name('log-download');
    //     // <div class="column">
    //     //     <div > <a href="{{ /log-download/$items }}" class="ui teal button">엑셀파일 다운로드</a></div>
    //     // </div>

    //     $response = Excel::download($export, 'loginmenus.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    //     ob_end_clean();

    //     return $response;
    // }

    //-------------------------------------------
    public function download(Request $request)
    {
        $r = $request->input();
        $from   = $this->checkFrom($r);
        $to     = $this->checkTo($r);
        $user_find_key = $this->checkDefault($r, 'user_find_key', null);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $key = Carbon::now()->format('Ymd');
        $filename = 'loginmenus_'.$key.'.xlsx';

        $path = public_path('/download/'.$filename);
        //if (!file_exists($path))
        {
            Excel::store(new LoginmenuExport($from, $to, $user_find_key, $searchText), $filename, 'download');
        }

        return response()->json(['url'=>'/download/'.$filename], JSON_UNESCAPED_UNICODE);
    }

    //-----------------------------------------
    public function insert(Request $request)
    {
        $id = 0;

        $this->beginTransaction();

        try
        {
            $item = new LoginMenu();
            $id = LoginMenu::max('id');
            if ( !isset($id) )
            {
                $id = 1;
            }
            else
            {
                $id++;
            }
            $item->user_id      = $this->getUserId();
            $item->menu_id      = $request->menu_id;
            $item->menu_nm      = $request->menu_nm;
            $item->menu_act     = $request->menu_act;
            $item->ref_id       = $request->ref_id;

            //로그인 시간, ip를 스냅샷해 놓아야 함.
            $logins = Logins::where('user_id', $item->user_id)->orderBy('created_at', 'desc')->first();
            if (isset($logins))
            {
                $item->login_at = $logins->in_time;
                $item->login_ip = $logins->login_ip;
            }

            $item->save();

            $this->commit();
        }
        catch(Exception $e)
        {
        }
        finally
        {
            $this->endTransaction();
        }

        return $id;
    }

    //-------------------------------------------
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $id = $this->insert($request);

        return $this->handle_ok("등록되었습니다.", ['id'=>$id]);
    }

    //-----------------------------------------
    public function writLog($menu_id, $menu_nm, $menu_act, $refId = null)
    {
        $id = 0;

        $request = new Request();
        $request['menu_id'] = $menu_id;
        $request['menu_act'] = $menu_act;

        if (empty($menu_nm))
        {
            $menu = Menu::find($menu_id);
            if (isset($menu))
            {
                $request['menu_nm'] = $menu->url;
            }
        }
        else
        {
            $request['menu_nm'] = $menu_nm;
        }

        $request['ref_id'] = $refId;

        $id = $this->insert($request);
    }
}
