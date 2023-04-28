<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MeetingController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'meeting';
    const __TABLE__ = 'meetings';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "vote_st" AND code_id=vote_st) AS vote_st';

    protected $rules =
        [
            'subject' => 'required',
            'round' => 'required',
            'hold_at' => 'required',
            'created_at' => 'required',
            'vote_st' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Meeting');
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $this->checkMenuAuth(null, true);

        parent::index($request);

        return $this->getList($request);
    }

    //-------------------------------------------
    //콘텐트 목록 조회
    public function getContent(Request $request)
    {
        //년도 목록 조회 (2021 ~ this year)
        $years = range(Carbon::now()->year, 2021);

        $arr_years = array();
        foreach($years as $it)
        {
            $arr = [];
            $arr['year'] = $it;
            $arr['selected'] = (Carbon::now()->year == $it)? true: false;

            array_push($arr_years, $arr);
        }

        $items_year = collect($arr_years);
        $items_year = json_decode(json_encode($items_year));

        return view('main.ko.information.governance_meet')->with([
            'items_year' => $items_year
        ]);
    }

    //-------------------------------------------
    //콘텐트 목록 조회 => 드롭박스에서 선택된 년도에 따라 목록을 조회해야 한다.
    public function getContentList(Request $request)
    {
        $r = $request->input();

        if (!is_null($r['year']))
        {
            $from   = Carbon::createFromDate($r['year'], 1, 1)->startOfDay();
            $to     = Carbon::createFromDate($r['year'], 12, 31)->endOfDay();
        }
        else
        {
            $from   = date('Y-m-d', strtotime(Carbon::now()->addDay()));
            $to     = date('Y-m-d', strtotime(Carbon::now()->addDay()));
            $from = Carbon::createFromFormat('Y-m-d', $from)->startOfYear();
            $to = Carbon::createFromFormat('Y-m-d', $to)->endOfYear();
        }

        $q = DB::table($this->table)->select(
            'id',
            'round',
            'subject',
            'hold_at',
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "vote_st" AND code_id=vote_st) AS vote_st'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_a_nm) AS dir_a_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_b_nm) AS dir_b_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_c_nm) AS dir_c_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_d_nm) AS dir_d_nm'),
            DB::raw("(case when dir_a_yn='Y' then '찬성' when dir_a_yn='N' then '반대' else 'N/A' end) AS dir_a_yn"),
            DB::raw("(case when dir_b_yn='Y' then '찬성' when dir_b_yn='N' then '반대' else 'N/A' end) AS dir_b_yn"),
            DB::raw("(case when dir_c_yn='Y' then '찬성' when dir_c_yn='N' then '반대' else 'N/A' end) AS dir_c_yn"),
            DB::raw("(case when dir_d_yn='Y' then '찬성' when dir_d_yn='N' then '반대' else 'N/A' end) AS dir_d_yn")
        )->orderBy('round', 'asc');

        $items = $q->whereBetween('hold_at', [$from, $to])->get();

        if (isset($items))
        {
            foreach($items as $item)
            {
                if($item->vote_st == '보고')
                {
                    $item->dir_a_yn = '-';
                    $item->dir_b_yn = '-';
                    $item->dir_c_yn = '-';
                    $item->dir_d_yn = '-';
                }
            }
        }

        $html = view('main.ko.information.governance_meet_tag')->with([
            'items_meeting' => $items
        ])->render();

        // return $this->handle_ok('OK', ['type'=>$this->clazz, 'items'=>$items]);
        return $this->handle_ok('OK', ['type'=>$this->clazz, 'html'=>$html]);
    }

    //-------------------------------------------
    //콘텐트 목록 조회
    public function getContentAll(Request $request)
    {
        $r = $request->input();

        $from = $this->checkFrom($r);
        $to = $this->checkTo($r);

        // 이사회(meeting)
        $q_meeting = DB::table($this->table)->select(
            'id',
            'round',
            'subject',
            'hold_at',
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "vote_st" AND code_id=vote_st) AS vote_st'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_a_nm) AS dir_a_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_b_nm) AS dir_b_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_c_nm) AS dir_c_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_d_nm) AS dir_d_nm'),
            DB::raw("(case when dir_a_yn='Y' then '찬성' when dir_a_yn='N' then '반대' else 'N/A' end) AS dir_a_yn"),
            DB::raw("(case when dir_b_yn='Y' then '찬성' when dir_b_yn='N' then '반대' else 'N/A' end) AS dir_b_yn"),
            DB::raw("(case when dir_c_yn='Y' then '찬성' when dir_c_yn='N' then '반대' else 'N/A' end) AS dir_c_yn"),
            DB::raw("(case when dir_d_yn='Y' then '찬성' when dir_d_yn='N' then '반대' else 'N/A' end) AS dir_d_yn")
        )->orderBy('round', 'asc');

        // 위원회(committee)
        $q_committee = DB::table('committees')->select(
            'id',
            'commit_type',
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "commit_type" AND code_id=commit_type) AS commit_type_nm'),
            'subject',
            'hold_at',
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "vote_st" AND code_id=vote_st) AS vote_st'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_a_nm) AS dir_a_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_b_nm) AS dir_b_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_c_nm) AS dir_c_nm'),
            DB::raw('(SELECT code_nm FROM codes WHERE codegroup_id = "committee" AND code_id=dir_d_nm) AS dir_d_nm'),
            DB::raw("(case when dir_a_yn='Y' then '찬성' when dir_a_yn='N' then '반대' else 'N/A' end) AS dir_a_yn"),
            DB::raw("(case when dir_b_yn='Y' then '찬성' when dir_b_yn='N' then '반대' else 'N/A' end) AS dir_b_yn"),
            DB::raw("(case when dir_c_yn='Y' then '찬성' when dir_c_yn='N' then '반대' else 'N/A' end) AS dir_c_yn"),
            DB::raw("(case when dir_d_yn='Y' then '찬성' when dir_d_yn='N' then '반대' else 'N/A' end) AS dir_d_yn")
        )->orderBy('commit_type', 'asc');

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();

        $items_meeting = $q_meeting->whereBetween('hold_at', [$from, $to])->get();
        $items_committee = $q_committee->whereBetween('hold_at', [$from, $to])->get();

        if (isset($items_meeting))
        {
            foreach($items_meeting as $item)
            {
                if($item->vote_st == '보고')
                {
                    $item->dir_a_yn = '-';
                    $item->dir_b_yn = '-';
                    $item->dir_c_yn = '-';
                    $item->dir_d_yn = '-';
                }
            }
        }

        if (isset($items_committee))
        {
            foreach($items_committee as $item)
            {
                if($item->vote_st == '보고')
                {
                    $item->dir_a_yn = '-';
                    $item->dir_b_yn = '-';
                    $item->dir_c_yn = '-';
                    $item->dir_d_yn = '-';
                }
            }
        }

        return view('main.ko.information.governance_meet')->with([
            'items_meeting' => $items_meeting,
            'items_committee' => $items_committee
        ]);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        $items      = null;
        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $searchText = $this->checkDefault($r, 'searchText', null);

        $q = DB::table($this->table)->select(
            'id',
            'round',
            DB::raw(self::CODE),
            'subject',
            'hold_at',
            'created_at'
        );

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if (isset($searchText))
        {
            //제목 키워드
            $q = $q->where('subject', 'LIKE', '%'.$searchText.'%');
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)->appends(request()->except('page'));
        $items_vote_st = DB::table('codes')->where(['codegroup_id' => 'vote_st'])->get();

        $items_count = DB::table($this->table)->count();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_count' => $items_count,
            'items_vote_st' => $items_vote_st,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();

        $item = null;
        $id = $r['id'];
        if ( isset($id) )
        {
            $item = Meeting::find($id);
            if (isset($item))
            {
                $user = User::find($item->created_id);
                if ( isset($user) )
                {
                    $item->created_id = $user->name;
                    $user = User::find($item->updated_id);
                    $item->updated_id = $user->name;
                }
            }
        }

        //공통코드 조회
        $items_vote_st = DB::table('codes')->where(['codegroup_id' => 'vote_st'])->get();
        $items_agree_yn = DB::table('codes')->where(['codegroup_id' => 'agree_yn'])->orderBy('code_id','desc')->get();
        $items_committee = DB::table('codes')->where(['codegroup_id' => 'committee'])->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_vote_st' => $items_vote_st,
            'items_agree_yn' => $items_agree_yn,
            'items_committee' => $items_committee,
            'item' => $item
        ]);
    }
}
