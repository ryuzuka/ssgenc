<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Part;
use App\Models\User;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\AccessHistoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AccessController;

class AccessHistoryController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'accesshistory';
    const __TABLE__ = 'accesshistories';
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
        $user_find_key = $this->checkDefault($r, 'user_find_key', null);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $find_key = null;
        if (isset($user_find_key) && $user_find_key != '00')
        {
            //user_id, name 검색 선택
            $find_key = $user_find_key;
        }

        $where = array();

        $q = DB::table($this->table);
        $q = $q->select(
            'id',
            'menu_id',
            'access_id',
            'access_state',
            'reason',
            'approved_id',
            'created_id',
            'login_ip',
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
            $access = (new AccessController)->getAccessUserList($find_key, $searchText);
            if (isset($access))
            {
                $q = $q->whereIn('access_id', $access);
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
                $menu = Menu::find($item->menu_id);
                if(isset($menu))
                {
                    $item->{"menu_nm"} = $menu->menu_nm;
                }

                $access = Access::find($item->access_id);
                if (isset($access))
                {
                    $user = User::find($access->access_nm);
                    if (isset($user))
                    {
                        $item->{"user_id"} = $user->user_id;
                        $item->{"name"} = $user->name;
                        // $part = Part::find($user->part_id);
                        // if (isset($part))
                        // {
                        //     $item->{"part_nm"} = $part->part_nm;
                        // }
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
    public function download(Request $request)
    {
        $r = $request->input();
        $from   = $this->checkFrom($r);
        $to     = $this->checkTo($r);
        $user_find_key = $this->checkDefault($r, 'user_find_key', null);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $key = Carbon::now()->format('Ymd');
        $filename = 'accesshistory_'.$key.'.xlsx';

        $path = public_path('/download/'.$filename);
        Excel::store(new AccessHistoryExport($from, $to, $user_find_key, $searchText), $filename, 'download');

        return response()->json(['url'=>'/download/'.$filename], JSON_UNESCAPED_UNICODE);
    }
}
