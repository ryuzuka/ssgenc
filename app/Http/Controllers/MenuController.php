<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Menu;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Menu as MenuResource;

class MenuController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'menu';
    const __TABLE__ = 'menus';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $rules =
        [
            'category' => 'required',
            'menu_nm' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Menu');
        $this->model_id = 'menu_id';
    }

    //-------------------------------------------
    public function getItems($category)
    {
        $result = Menu::where(['category'=>$category, 'useflag'=>'Y'])->get();
        return isset($result)? $result : null;
    }

    //-------------------------------------------
    public function getAccessMenuItems($category)
    {
        // $result = Menu::where(['category'=>$category, 'useflag'=>'Y'])->get();
        // return isset($result)? $result : null;

        $result = DB::table('accesses')
            ->select(
                'menus.menu_id',
                'menus.category',
                'menus.menu_nm',
                'menus.url',
                'menus.seq',    //메뉴의 표시 순서를 결정 한다.
                DB::raw("'false' as current"),
                'accesses.useflag as access_yn'
            )
            ->join('menus', 'accesses.menu_id', '=', 'menus.menu_id')
            ->where(['accesses.access_nm'=>$this->getUserId(), 'menus.category'=>$category])
            ->orderBy('menus.seq', 'asc')
            ->get();

            return isset($result)? $result : null;
    }

    //-------------------------------------------
    public function getAccessMenuList()
    {
        $user_id = $this->getUserId();
        // $user_id = 'test_9';

        $count = Access::where('access_nm', $user_id)->count();
        if($count == 0)
        {
            // 관리자 등록 페이지로 이동
            return null;
        }

        $ret = DB::table('accesses')
            ->select(
                'menus.menu_id',
                'menus.category',
                'menus.menu_nm',
                'menus.url',
                'menus.seq',    //메뉴의 표시 순서를 결정 한다.
                DB::raw("'false' as current"),
                'accesses.useflag as access_yn'
            )
            ->join('menus', 'accesses.menu_id', '=', 'menus.menu_id')
            ->where(['accesses.access_nm'=>$user_id])
            ->orderBy('menus.seq', 'asc')
            ->get();

        $menus = [];
        $project = [];
        $board = [];
        $site = [];
        $manager = [];

        $i = $j = $k = $l = 0;
        foreach($ret as $it)
        {
            if($it->category=='프로젝트 관리')
            {
                $project[$i++] = $it;
            }
            else if ($it->category=='게시판 관리')
            {
                $board[$j++] = $it;
            }
            else if ($it->category=='사이트 관리')
            {
                $site[$k++] = $it;
            }
            else if ($it->category=='관리자 관리')
            {
                $manager[$l++] = $it;
            }
        }

        $menus[0] = $project;
        $menus[1] = $board;
        $menus[2] = $site;
        $menus[3] = $manager;

        // dd($menus);

        return $menus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $item_find_key = $this->checkDefault($r, 'item_find_key', '00');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $where = array();
        $q = DB::table($this->table)
            ->select(
                'menu_id',
                'category',
                'menu_nm',
                'useflag',
                'created_at'
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
            //제목 키워드
            if($item_find_key != '00')
            {
                $q = $q->where(($item_find_key=='01')?'category':'menu_nm', 'LIKE', '%'.$searchText.'%');
            }
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)
                    ->appends(request()->except('page'));

        $items_count = DB::table($this->table)->count();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_count' => $items_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();
        $item = Menu::find($r['id']);

        $items_expo_yn = DB::table('codes')->where('codegroup_id', 'expo_yn')->orderBy('code_id','desc')->get();

        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_expo_yn' => $items_expo_yn,
            'item' => $item
        ]);
    }

    //-------------------------------------------
    //upload 처리 후, 해야할 것.
    public function uploadAfter(Request $request)
    {
        $r = $request->input();

        $data = json_decode($r['data'], true);

        $seq = 0;

        try
        {
            //[주의] 신규 일때만, 증가 시켜야 한다.
            if ($this->insert)
            {
                $seq = $this->model::where('category', $data['category'])->max('seq') + 1;

                //[주의]편의상(공통 모듈화 작업) 클라이언트에서는 모두 id로 통일했음.
                //따라서, 여기서 $this->model_id를 사용하면 안된다.
                $item = $this->model::find($data['id']);
                if (isset($item))
                {
                    $item->seq = $seq;
                    $item->save();
                }
            }
        }
        catch(QueryException $e)
        {

        }
        finally
        {

        }

        return $seq;
    }

}
