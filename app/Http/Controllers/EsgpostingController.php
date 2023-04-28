<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Esgposting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FileController;

class EsgpostingController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'esgposting';
    const __TABLE__ = 'esgpostings';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $rules =
        [
            'subject' => 'required',
            'expo_yn' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Esgposting');
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $this->checkMenuAuth(null, true);

        parent::index($request);

        return $this->getList($request);
    }

    //-------------------------------------------
    // 콘텐트 목록 조회
    public function getContentList(Request $request)
    {
        $r = $request->input();

        $items      = null;

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');

        $where = array();

        $q = DB::table($this->table);
        $q = $q->select(
            'id',
            'subject',
            'created_at'
        );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if ( isset($expo_yn) )
        {
            $q = $q->where('expo_yn', $expo_yn);
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::MAIN_PAGE_LIMIT)
                    ->appends(request()->except('page'));
        $items_count = DB::table($this->table)->count();

        return view('main.ko.information.governance_esg')->with([
            'items_count' => $items_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    // 콘텐트 상세 조회
    public function getContentDetail(Request $request)
    {
        $r = $request->input();

        $prev_item = null;
        $next_item = null;
        $item = null;
        $files = null;

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = Esgposting::find($id);
            if(isset($item))
            {
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $files = (new FileController)->downloadList($item->attach_id);
                    if (isset($files))
                    {
                        foreach($files as $f)
                        {
                            if($f['file_view_id'] === '#pc_image')
                            {
                                $item->{"pc_image"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#mo_image')
                            {
                                $item->{"mo_image"} = $f['file_path'];
                            }
                        }
                    }
                }
            }
        }

        $prev_item = Esgposting::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $next_item = Esgposting::where('id', '<', $id)->orderBy('id','desc')->first();

        return view('main.ko.information.governance_esg_dtl')->with([
            'item' => $item,
            'prev_item' => $prev_item,
            'next_item' => $next_item
        ]);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        $items      = null;

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $where = array();

        $q = DB::table($this->table);
        $q = $q->select(
            'id',
            'subject',
            'expo_yn',
            'created_at'
        );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if ( isset($expo_yn) )
        {
            $q = $q->where('expo_yn', $expo_yn);
        }

        if (isset($searchText))
        {
            //제목 키워드
            $q = $q->where('subject', 'LIKE', '%'.$searchText.'%');
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)->appends(request()->except('page'));

        $items_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_expo_yn' => $items_expo_yn,
            'items_count' => $items_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();

        $item = null;
        $file_token = null;
        $files = null;
        if ( isset($r['id']) )
        {
            $item = Esgposting::find($r['id']);
            if (isset($item))
            {
                $user = User::find( $item->created_id);
                if ( isset($user) )
                {
                    $item->created_id = $user->name;
                    $user = User::find($item->updated_id);
                    $item->updated_id = $user->name;
                }
            }

            //다운로드 첨부파일 정보 읽기.
            $arrfiles = (new FileController)->show($item->attach_id);
            if (isset($arrfiles))
            {
                $file_token = $arrfiles['file_token'];
                $files = $arrfiles['files'];
            }
        }

        //공통코드 조회
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_expo_yn' => $items_expo_yn,
            'item' => $item,
            'file_token' => $file_token,
            'files' => $files
        ]);
    }

}
