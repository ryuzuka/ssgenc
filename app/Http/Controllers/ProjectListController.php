<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Project;
use App\Models\Information;
use App\Models\ProjectList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class ProjectListController extends Controller
{
    const __PKG__ = 'admin.';
    const __CLAZZ__ = 'projectlist';
    const __TABLE__ = 'projectlists';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';
    const err_select_failure = self::__CLAZZ__.'-E004';

    const CODE1 =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "biz_area" AND code_id=biz_area) AS biz_area';

    const CODE2 ='(SELECT code_nm FROM codes WHERE codegroup_id = "open_yn" AND code_id=open_yn) AS open_yn';

    protected $rules =
        [
            //'area'          => 'required',
            //'biz_area'      => 'required',
            //'gubun'         => 'required',
            'from'          => 'required|date_format:Y-m-d',
            'to'            => 'required|date_format:Y-m-d',
            'open_yn'       => 'required',
            'project_yn'    => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\ProjectList');
    }

    //-------------------------------------------
    //프로젝트 실적보기
    public function getItems(Request $request)
    {
        // {
        //     "list": [
        //       {"type": "주상복합", "name": "피엔폴루스1", "address": "주소", "scale": "test", "duration": "2019.12 ~ 2021.12"},
        //       {"type": "주상복합", "name": "피엔폴루스2", "address": "주소", "scale": "test", "duration": "2019.12 ~ 2021.12"},
        //       {"type": "주상복합", "name": "피엔폴루스3", "address": "주소", "scale": "test", "duration": "2019.12 ~ 2021.12"},
        //       {"type": "주상복합", "name": "피엔폴루스4", "address": "주소", "scale": "test", "duration": "2019.12 ~ 2021.12"},
        //       {"type": "주상복합", "name": "피엔폴루스5", "address": "주소", "scale": "test", "duration": "2019.12 ~ 2021.12"}
        //     ],
        //     "totalLength": 60
        //   }

        $r = $request->input();

        $lang = $this->getLanguage();

        $biz_area = '02';
        if (isset($r['biz_area']))
        {
            $biz_area = $r['biz_area'];
        }

        $category = $this->getCategory($biz_area);

        $q = null;
        $items = null;
        if ( isset($lang) )
        {
            $codegroup_id = null;
            switch($biz_area)
            {
                default:
                case '02': $codegroup_id = 'rf_gubun'; break; //주거시설
                case '03': $codegroup_id = 'bf_gubun'; break; //건축시설
                case '04': $codegroup_id = 'cf_gubun'; break; //토목시설
                case '05': $codegroup_id = 'lb_gubun'; break; //레저사업
            }

            $q = DB::table($this->table);
            if ($lang == 'ko')
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id = '".$codegroup_id."' AND code_id=gubun) AS gubun"),
                    DB::raw("'N' as main_yn"),
                    'project_yn',
                    'name_ko as name',
                    'address_ko as address',
                    'volumn_ko as volumn',
                    'from',
                    'to'
                );
            }
            else
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm_en FROM codes WHERE codegroup_id = '".$codegroup_id."' AND code_id=gubun) AS gubun"),
                    DB::raw("'N' as main_yn"),
                    'project_yn',
                    'name_en as name',
                    'address_en as address',
                    'volumn_en as volumn',
                    'from',
                    'to'
                );
            }

            $where = array();
            if (isset($biz_area) && $biz_area != '01')
            {
                //실제 전체는 없음.
                $where['biz_area'] = $biz_area;
            }
            if (count($where) > 0)
            {
                $q = $q->where($where);
            }

            $items = $q->orderBy('created_at', 'desc')->paginate(self::MAIN_PAGE_LIMIT)
                    ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.
        }

        if (isset($items))
        {
            foreach($items as $item)
            {
                if($item->from == $item->to)
                {
                    if ($item->project_yn == 'Y')
                    {
                        $item->{"duration"} = $item->from.' ~ '.(($lang=='ko')? '진행중':'under construction');
                    }
                    else
                    {
                        $item->{"duration"} = $item->from;
                    }
                }
                else
                {
                    $item->{"duration"} = $item->from.' ~ '.$item->to;
                }
            }
        }

        return $this->handle_ok("OK", [
            'biz_area' => $biz_area,
            'category' => $category,
            "list"=>$items
        ]);
    }

    //-------------------------------------------
    private function getCategory($biz_area)
    {
        $category = null;
        $lang = $this->getLanguage();
        if ( isset($lang) )
        {
            switch($biz_area)
            {
                default:
                case '02': $category = ($lang=='ko')?'주거시설':'Residential facilities'; break;        //주거시설
                case '03': $category = ($lang=='ko')?'건축시설':'Buildings'; break;                     //건축시설
                case '04': $category = ($lang=='ko')?'토목시설':'Civil engineering facilities'; break;  //토목시설
                case '05': $category = ($lang=='ko')?'레저사업':'Leisure Projects'; break;              //레저사업
            }
        }

        return $category;
    }

    //쿼리 검색 조건 개수와 전체개수를 구해서 넘겨야 함.
    //-------------------------------------------
    public function index(Request $request)
    {
        $this->checkMenuAuth(null, true);

        parent::index($request);

        $q = DB::table($this->table);
        $project_count = $q->count();

        $projects =
            $q->select(
                'id',
                DB::raw(self::CODE1),
                'name_ko',
                DB::raw(self::CODE2),
                DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id=(
                    case
                        when biz_area = '02' then 'rf_gubun'
                        when biz_area = '03' then 'bf_gubun'
                        when biz_area = '04' then 'cf_gubun'
                        when biz_area = '05' then 'lb_gubun'
                    end
                    ) AND code_id=gubun) AS gubun"),
                'created_at'
            )->orderBy('created_at', 'desc')->paginate(self::PAGE_LIMIT);

        //공통코드 조회
        // $items_area = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
        $items_biz_area = DB::table('codes')->where(['codegroup_id' => 'biz_area'])->get();
        $items_gubun = DB::table('codes')->where(['codegroup_id' => 'rf_gubun'])->get();
        $items_open_yn = DB::table('codes')->where(['codegroup_id' => 'open_yn'])->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            // 'items_area' => $items_area,
            'items_biz_area' => $items_biz_area,
            'items_gubun' => $items_gubun,
            'items_open_yn' => $items_open_yn,
            'project_count' => $project_count,
            'projects' => $projects
        ]);
    }

    //-------------------------------------------
    public function getGubunCd(Request $request)
    {
        $r = $request->input();
        $biz_area = $r['biz_area'];
        $lang = $this->getLanguage();
        if ( isset($lang) )
        {
            $codegroup_id = null;
            switch($biz_area)
            {
                default:
                case '02': $codegroup_id = 'rf_gubun'; break; //주거시설
                case '03': $codegroup_id = 'bf_gubun'; break; //건축시설
                case '04': $codegroup_id = 'cf_gubun'; break; //토목시설
                case '05': $codegroup_id = 'lb_gubun'; break; //레저사업
            }

            $items_gubun = DB::table('codes')->where(['codegroup_id'=>$codegroup_id, 'useflag'=>'Y'])->get();
        }

        return $this->handle_ok("OK", ['items_gubun'=>$items_gubun]);
    }

    //-------------------------------------------
    // 프로젝트 실적 목록 조회
    public function getResultList(Request $request)
    {
        //프로젝트 카테고리별 구분이 다름.
        $r = $request->input();

        $lang = $this->getLanguage();

        $biz_area = '02';
        if (isset($r['biz_area']))
        {
            $biz_area = $r['biz_area'];
        }

        $category = $this->getCategory($biz_area);

        $q = null;
        $items = null;
        if ( isset($lang) )
        {
            $codegroup_id = null;
            switch($biz_area)
            {
                default:
                case '02': $codegroup_id = 'rf_gubun'; break; //주거시설
                case '03': $codegroup_id = 'bf_gubun'; break; //건축시설
                case '04': $codegroup_id = 'cf_gubun'; break; //토목시설
                case '05': $codegroup_id = 'lb_gubun'; break; //레저사업
            }

            $q = DB::table($this->table);
            if ($lang == 'ko')
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id = '".$codegroup_id."' AND code_id=gubun) AS gubun"),
                    DB::raw("'N' as main_yn"),
                    'project_yn',
                    'name_ko as name',
                    'address_ko as address',
                    'volumn_ko as volumn',
                    'from',
                    'to'
                );
            }
            else
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm_en FROM codes WHERE codegroup_id = '".$codegroup_id."' AND code_id=gubun) AS gubun"),
                    DB::raw("'N' as main_yn"),
                    'project_yn',
                    'name_en as name',
                    'address_en as address',
                    'volumn_en as volumn',
                    'from',
                    'to'
                );
            }

            $where = array();
            if (isset($biz_area) && $biz_area != '01')
            {
                //실제 전체는 없음.
                $where['biz_area'] = $biz_area;
            }

            if (count($where) > 0)
            {
                $q = $q->where($where);
            }

            $items = $q->orderBy('created_at', 'desc')->paginate(self::MAIN_PAGE_LIMIT)
            ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.
        }

        $if = Information::find(1);

        // 'title_rf_1' => '15년간 45건 프로젝트 수행', => hf_age hf_project
        // 'title_rf_2' => '총 공사비 2조 3천억', => hf_amt

        // 'title_bf_1' => '20년간 459건 프로젝트 수행', => cf_age cf_project
        // 'title_bf_2' => '총 공사비 12조 6천억', => cf_amt

        // 'title_cf_1' => '19년간 61건 프로젝트 수행', => ce_age ce_project
        // 'title_cf_2' => '총 공사비 6천억', => ce_amt

        // 'title_lb_1' => '28년간 골프장 2개 운영', => lb_age lb_count
        // 'title_lb_2' => '총 64만평 규모', => lb_amt

        if (isset($if))
        {
            switch($biz_area)
            {
                default:
                case '02': //주거시설
                    $title_1 = $if->hf_age.'년간 '.$if->hf_project.'건 프로젝트 수행';
                    $title_2 = '총 공사비 '.$if->hf_amt;
                    break;
                case '03': //건축시설
                    $title_1 = $if->cf_age.'년간 '.$if->cf_project.'건 프로젝트 수행';
                    $title_2 = '총 공사비 '.$if->cf_amt;
                    break;
                case '04': //토목시설
                    $title_1 = $if->ce_age.'년간 '.$if->ce_project.'건 프로젝트 수행';
                    $title_2 = '총 공사비 '.$if->ce_amt;
                    break;
                case '05': //레저사업
                    $title_1 = $if->lb_age.'년간 '.$if->lb_project.'개 운영';
                    $title_2 = '총 '.$if->lb_amt.'만평 규모';
                    break;
            }
        }

        return view('main.'.$lang.'.project.pj_list')->with([
            'modal' => true,
            'title_1' => $title_1,
            'title_2' => $title_2,
            'biz_area' => $biz_area,
            'category' => $category,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        // $area = $r['area'];
        $biz_area = $r['biz_area'];

        $where = array();
        // if (isset($area) && $area != '01')
        // {
        //     $where['area'] = $area;
        // }
        if (isset($biz_area) && $biz_area != '01')
        {
            $where['biz_area'] = $biz_area;
        }
        if (isset($r['gubun']) && $r['gubun'] != '01')
        {
            $where['gubun'] = $r['gubun'];
        }

        // Log::debug("where => " . json_encode($where));

        $from       = $r['from'];
        $to         = $r['to'];
        $open_yn    = $r['open_yn'];
        $searchText = (isset($r['searchText']))? $r['searchText'] : null;

        $codegroup_id = null;
        switch($biz_area)
        {
            default:
            case '02': $codegroup_id = 'rf_gubun'; break; //주거시설
            case '03': $codegroup_id = 'bf_gubun'; break; //건축시설
            case '04': $codegroup_id = 'cf_gubun'; break; //토목시설
            case '05': $codegroup_id = 'lb_gubun'; break; //레저사업
        }

        $q = DB::table($this->table)
            ->select(
                'id',
                DB::raw(self::CODE1),
                'name_ko',
                DB::raw(self::CODE2),
                DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id=(
                    case
                        when biz_area = '02' then 'rf_gubun'
                        when biz_area = '03' then 'bf_gubun'
                        when biz_area = '04' then 'cf_gubun'
                        when biz_area = '05' then 'lb_gubun'
                    end
                    ) AND code_id=gubun) AS gubun"),
                'created_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $q = $q->whereDate('from', '>=', $from)
                ->whereDate('to', '<=', $to);

        if ($open_yn != '01')
        {
            $q = $q->where('open_yn', '=', $open_yn);
        }

        if (isset($searchText))
        {
            //프로젝트명 키워드
            $q = $q->where('name_'.$this->getLanguage(), 'LIKE', '%'.$searchText.'%');
        }

        $projects = $q->orderBy('created_at', 'desc')->paginate(self::PAGE_LIMIT)

        //페이지를 바로 호출할 경우 참조.
        ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.
        $project_count = DB::table($this->table)->count();

        //공통코드 조회
        // $items_area     = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
        $items_biz_area = DB::table('codes')->where(['codegroup_id' => 'biz_area'])->get();
        $items_open_yn  = DB::table('codes')->where(['codegroup_id' => 'open_yn'])->get();
        $items_gubun    = DB::table('codes')->where(['codegroup_id' => $codegroup_id])->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            // 'items_area' => $items_area,
            'items_biz_area' => $items_biz_area,
            'items_gubun' => $items_gubun,
            'items_open_yn' => $items_open_yn,
            'project_count' => $project_count,
            'projects' => $projects
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();
        $id = $r['id'];
        $project = null;
        if ( isset($id) )
        {
            $project = ProjectList::find($id);
            if (isset($project))
            {
                $user = User::where(['user_id' => $project->created_id])->get();
                if ( isset($user[0]) )
                {
                    // Log::debug('user => '.$user);
                    $project->created_id = $user[0]->name;

                    $user = User::where(['user_id' => $project->updated_id])->get();
                    // Log::debug('user => '.$user);
                    $project->updated_id = $user[0]->name;
                }
            }
        }

        //공통코드 조회
        // $items_area     = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
        $items_biz_area = DB::table('codes')->where(['codegroup_id' => 'biz_area'])->get();
        $items_open_yn  = DB::table('codes')->where(['codegroup_id' => 'open_yn'])->get();
        $items_main_yn  = DB::table('codes')->where(['codegroup_id' => 'main_yn'])->get();

        $biz_area = null;
        $items_gubun = null;
        if (isset($project))
        {
            $biz_area = $project->biz_area;
        }
        else
        {
            $biz_area = $r['biz_area'];
        }

        $codegroup_id = null;
        switch($biz_area)
        {
            default:
            case '02': $codegroup_id = 'rf_gubun'; break; //주거시설
            case '03': $codegroup_id = 'bf_gubun'; break; //건축시설
            case '04': $codegroup_id = 'cf_gubun'; break; //토목시설
            case '05': $codegroup_id = 'lb_gubun'; break; //레저사업
        }

        $items_gubun = DB::table('codes')->where(['codegroup_id' => $codegroup_id])->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            // 'items_area' => $items_area,
            'items_biz_area' => $items_biz_area,
            'items_gubun' => $items_gubun,
            'items_open_yn' => $items_open_yn,
            'project' => $project
        ]);
    }

    //-------------------------------------------
    public function show(Request $request)
    {
        $r = $request->input();

        $where = array();
        if (isset($r['area']) && $r['area'] != '01')
        {
            array_push($where, 'area', $r['area']);
        }
        if (isset($r['biz_area']) && $r['biz_area'] != '01')
        {
            array_push($where, 'biz_area', $r['biz_area']);
        }
        if (isset($r['gubun']) && $r['gubun'] != '01')
        {
            array_push($where, 'gubun', $r['gubun']);
        }

        Log::debug("where => " . $where);

        $from       = $r['from'];
        $to         = $r['to'];
        $open_yn    = $r['open_yn'];

        $q = DB::table($this->table)
            ->select(
                'id',
                DB::raw(self::CODE1),
                'name_ko',
                DB::raw(self::CODE2),
                'created_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $q = $q->whereDate('from', '>=', $from)
                ->whereDate('to', '<=', $to);

        if ($open_yn != '01')
        {
            $q = $q->where('open_yn', $open_yn);
        }

        $projects = $q->paginate(self::PAGE_LIMIT);
        return response()->json($projects);
    }

    //-------------------------------------------
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        try
        {
            $id = $request['id'];
            if ( isset($id) )
            {
                $project = ProjectList::find($id);
            }
            else
            {
                $project = new ProjectList();
            }

            // $project->area          = $request->area;
            $project->area          = '02';
            $project->biz_area      = $request->biz_area;
            $project->gubun         = $request->gubun;
            $project->name_ko       = $request->name_ko;
            $project->name_en       = $request->name_en;
            $project->address_ko    = $request->address_ko;
            $project->address_en    = $request->address_en;
            $project->volumn_ko     = $request->volumn_ko;
            $project->volumn_en     = $request->volumn_en;
            $project->from          = $request->from;
            $project->to            = $request->to;
            $project->open_yn       = $request->open_yn;
            $project->project_yn    = $request->project_yn;
            $project->created_id    = $this->getUserId();
            $project->updated_id    = $this->getUserId();
            $project->save();

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

        return $this->handle_ok("프로젝트 실적이 등록되었습니다.", ['id'=>$project->id]);
    }

}
