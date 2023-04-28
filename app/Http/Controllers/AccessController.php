<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Models\AccessHistory;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'access';
    const __TABLE__ = 'accesses';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $rules =
        [
            'access_id' => 'required',
            'menu_id' => 'required',
            'access_nm' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;

    public function __construct()  
    {
    }

    //-------------------------------------------
    public function hasAccess($menu_key)
    {
        $user_id = $this->getUserId();

        $ret = DB::table($this->table)
            ->select($this->table.'.useflag')
            ->join('menus', $this->table.'.menu_id', '=', 'menus.menu_id')
            ->where(['menus.url'=>$menu_key, $this->table.'.access_nm'=>$user_id])
            ->first();

        return $ret->useflag;
    }

    // //-------------------------------------------
    // public function index(Request $request)
    // {
    //     $items_count = DB::table('accesses')->count();

    //     //공통코드 조회
    //     // $items_contrib = DB::table('codes')->where(['codegroup_id' => 'contrib'])->get();
    //     // $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

    //     return view(self::__PKG__.'access.list')->with([
    //         'items_count' => $items_count,
    //         'items' => null
    //     ]);
    // }

    //-----------------------------------------
    public function store($user_id, $reason, $approved_id, $menus)
    {
        try
        {
            $item = Access::where(['access_nm'=>$user_id])->first();
            if( !isset($item) )
            {
                $id = Access::max('access_id');
                if ( !isset($id) )
                {
                    $id = 1;
                }
                else
                {
                    $id++;
                }

                $items = array();
                foreach($menus as $it)
                {
                    array_push($items, [
                        'access_id'=>$id,
                        'menu_id'=>$it['menu_id'],
                        'access_nm'=>$user_id,
                        'useflag'=>$it['useflag']
                    ]);
                }

                Access::insert($items);

                //모두 추가되는 상태 이므로 모두 이력으로 남기면 된다.
                //코드정의 = {1:신규추가, 2:신규해제, 3:변경추가, 4:변경해제}
                $histories = array();
                foreach($menus as $it)
                {
                    array_push($histories, [
                        'menu_id'=>$it['menu_id'],
                        'access_id'=>$id,
                        'reason'=>$reason,
                        'approved_id'=>$approved_id,
                        'access_state'=>($it['useflag']=='Y')? '1' : '2',
                        'created_id'=>$this->getUserId(),
                        'updated_id'=>$this->getUserId(),
                        'login_ip'=>$this->getLoginIp(),
                        'created_at'=>now(),
                        'updated_at'=>now()
                    ]);
                }

                AccessHistory::insert($histories);
            }
            else
            {
                $id = $item->access_id;

                //변경된 것만 찾아서 갱신 또는 추가할 수 있다면...

                foreach($menus as $it)
                {
                    $row = Access::where([
                                'access_id'=>$id,
                                'menu_id'=>$it['menu_id'],
                                'access_nm'=>$user_id
                            ])->first();
                    if (isset($row))
                    {
                        //다른 경우만 업데이트해야 함.
                        //이력관리를 위해서
                        if ($row->useflag != $it['useflag'])
                        {
                            Access::where([
                                'access_id'=>$id,
                                'menu_id'=>$it['menu_id'],
                                'access_nm'=>$user_id
                            ])->update(['useflag'=>$it['useflag']]);

                            //권한 변경 이력
                            AccessHistory::insert([
                                'menu_id'=>$it['menu_id'],
                                'access_id'=>$id,
                                'reason'=>$reason,
                                'approved_id'=>$approved_id,
                                'access_state'=>($it['useflag']=='Y')? '3' : '4',
                                'created_id'=>$this->getUserId(),
                                'updated_id'=>$this->getUserId(),
                                'login_ip'=>$this->getLoginIp(),
                                'created_at'=>now(),
                                'updated_at'=>now()
                            ]);
                        }
                    }
                    else
                    {
                        Access::insert([
                            'access_id'=>$id,
                            'menu_id'=>$it['menu_id'],
                            'access_nm'=>$user_id,
                            'useflag'=>$it['useflag']
                        ]);

                        //변경 추가
                        AccessHistory::insert([
                            'menu_id'=>$it['menu_id'],
                            'access_id'=>$id,
                            'reason'=>$reason,
                            'approved_id'=>$approved_id,
                            'access_state'=>($it['useflag']=='Y')? '1' : '2',
                            'created_id'=>$this->getUserId(),
                            'updated_id'=>$this->getUserId(),
                            'login_ip'=>$this->getLoginIp(),
                            'created_at'=>now(),
                            'updated_at'=>now()
                        ]);
                    }
                }
            }
        }
        catch(Exception $e)
        {
            return 0;
        }

        return $id;
    }

    //-----------------------------------------
    public function delete($access_id)
    {
        if ( !empty($access_id) )
        {
            $item = Access::find($access_id);
            if( isset($item) )
            {
                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    return true;
                }

                return false;
            }
        }

        return false;
    }

    //-----------------------------------------
    //특정 메뉴의 권한을 가진 사용자 아이디 목록을 리턴
    public function getMenuAccessUser($menu_url)
    {
        //작업예정.
        $users = null;
        $items = null;

        $menu = Menu::where(['url'=>$menu_url, 'useflag'=>'Y'])->first();
        // dd($menu);
        if (isset($menu))
        {
            $auth = Access::where(['menu_id'=>$menu->menu_id, 'useflag'=>'Y'])->get();
            if (isset($auth))
            {
                $users = array();
                foreach($auth as $it)
                {
                    array_push($users, $it->access_nm);
                }
                
                $q = User::where('email_yn', 'Y');
                if (count($users) > 0)
                {
                    $q = $q->whereIn('user_id', $users);
                }

                $items = $q->get();
            }
        }

        // dd($items);

        return $items;
    }

    //-----------------------------------------
    //검색 키워드의 권한을 가진 사용자 아이디 목록을 리턴
    public function getAccessUserList($find_key, $searchText)
    {
        $items_access = null;

        if (isset($find_key))
        {
            //아이디(01), 사용자명(02)
            if ($find_key == '01')
            {
                //검색 키워드의 사용자 아이디 또는 이름을 like로 찾아서, 권한키를 가지고 온다음 검색해야 함.
                $items_access = Access::where('access_nm', 'like', '%'.$searchText.'%')
                        ->where('useflag', 'Y')
                        ->distinct()->select('access_id')->get();
            }
            else
            {
                $users = User::where('name', 'like', '%'.$searchText.'%')
                        ->where('useflag', 'Y')->select('user_id')->get();
                if(isset($users))
                {
                    $items_access = Access::whereIn('access_nm', $users)
                            ->where('useflag', 'Y')
                            ->distinct()->select('access_id')->get();
                }
            }
        }

        return $items_access;
    }
}
