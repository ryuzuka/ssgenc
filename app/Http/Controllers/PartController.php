<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PartController extends Controller
{
    const __PKG__ = 'admin.manager.';
    const __CLAZZ__ = 'part';
    const __TABLE__ = 'parts';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $rules =
        [
            'part_nm' => 'required',
            'useflag' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Part');
        $this->model_id = 'part_id';
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
                'part_id',
                'part_nm',
                'remark',
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
                $q = $q->where('part_nm', 'LIKE', '%'.$searchText.'%');
            }
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->orderBy('part_id', 'desc')
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
        $item = Part::find($r['id']);

        $items_state = DB::table('codes')->where('codegroup_id', 'states')->orderBy('code_id','desc')->get();

        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_state' => $items_state,
            'item' => $item
        ]);
    }
}
