<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\File;
use App\Models\User;
use App\Models\Project;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\FileController;

class ProjectController extends Controller
{
    const __PKG__ = 'admin.';
    const __CLAZZ__ = 'project';
    const __TABLE__ = 'projects';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';
    const err_select_failure = self::__CLAZZ__.'-E004';

    const CODE1 =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "area" AND code_id=area) AS area
        ,(SELECT code_nm FROM codes WHERE codegroup_id = "biz_area" AND code_id=biz_area) AS biz_area';

    const CODE2 =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "main_yn" AND code_id=main_yn) AS main_yn
        ,(SELECT code_nm FROM codes WHERE codegroup_id = "open_yn" AND code_id=open_yn) AS open_yn';

    protected $rules =
        [
            'area'          => 'required',
            'biz_area'      => 'required',
            'gubun'         => 'required',
            //2022-02-17 : 김승권 책임 요청
            // 'name_ko'       => 'required',
            // 'name_en'       => 'required',
            // 'desc_ko'       => 'required',
            // 'desc_en'       => 'required',
            // 'address_ko'    => 'required',
            // 'address_en'    => 'required',
            // 'volumn_ko'     => 'required',
            // 'volumn_en'     => 'required',
            'from'          => 'required|date_format:Y-m-d',
            'to'            => 'required|date_format:Y-m-d',
            'open_yn'       => 'required',
            'main_yn'       => 'required',
            // 'attach_id'     => 'required',
            'project_yn'    => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Project');
    }

    //-------------------------------------------
    //사용되지 않음.
    public function getItems($biz_area)
    {
        $lang = $this->getLanguage();

        $sql = Project::where(['main_yn'=>'Y', 'biz_area'=>$biz_area]);

        //전체 또는 한글
        //open_yn => 01:전체, 02:국문, 03:영문, 04:비공개
        if ($lang == 'ko')
        {
            $sql = $sql->where(function($q)
            {
                return $q->where('open_yn','01')->orWhere('open_yn','02');
            });
        }
        else
        {
            $sql = $sql->where(function($q)
            {
                return $q->where('open_yn','01')->orWhere('open_yn','03');
            });
        }

        $items = $sql->get();

        $i = 1;
        foreach($items as $item)
        {
            // if ($lang == 'ko')
            // {
            //     switch($item->biz_area)
            //     {
            //         default:
            //         case '02': $category = 'Housing';           $text = '하루의 시작과 마무리'; break;  //주거시설
            //         case '03': $category = 'Architecture';      $text = '삶과 어우러지는 공간'; break;  //건축시설
            //         case '04': $category = 'Infrastructure';    $text = '자연과 공간의 연결'; break;  //토목시설
            //         case '05': $category = 'Leisure';           $text = '풍요로움 &amp; 마음의 행복'; break;  //레저사업
            //     }
            // }
            // else
            // {
            //     switch($item->biz_area)
            //     {
            //         default:
            //         case '02': $category = 'Housing';           $text = 'Spending a day from start to end'; break;  //주거시설
            //         case '03': $category = 'Architecture';      $text = 'A space that harmonizes with life'; break;  //건축시설
            //         case '04': $category = 'Infrastructure';    $text = 'Connecting nature and space'; break;  //토목시설
            //         case '05': $category = 'Leisure';           $text = 'Abundance & Happiness of Mind'; break;  //레저사업
            //     }
            // }

            if (isset($item) && $item->attach_id>0)
            {
                $files = (new FileController)->downloadList($item->attach_id);
                if (isset($files))
                {
                    foreach($files as $f)
                    {
                        if($f['file_view_id'] === '#main_image')
                        {
                            $item->{"main_image"} = $f['file_path'];
                        }
                        else if ($f['file_view_id'] === '#main_mo_image')
                        {
                            $item->{"main_mo_image"} = $f['file_path'];
                        }
                    }
                }
            }

            $item->{"tab_no"} = $i;
            // $item->{"tab_title"} = $category;
            // $item->{"tab_text"} = $text;
            $i++;
        }

        // dd($items);

        return isset($items[0])? $items[0] : null;
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

        $menus = null;
        $menus = $this->getLeftMenu();
        if ($menus == null)
        {
            // return $this->handle_error('9999', "권한등록이 되지 않았습니다.");
            return redirect('/auth-error');
        }

        //메뉴 권한 체크
        //프로젝트에서 한번 해야 한다.
        $ret = (new AccessController)->hasAccess($this->clazz);
        if ($ret == 'N')
        {
            //권한이 있는 디폴트 메뉴로 이동되도록 해야 한다.
            //메뉴 목록 스캔 후, 제일 처음 허용된 메뉴로 이동 한다.
            foreach($menus as $menu)
            {
                foreach($menu as $it)
                {
                    if ($it->access_yn == 'Y')
                    {
                        return redirect()->route($it->url)->send();
                    }
                }
            }
        }

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
        $items_area = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
        $items_biz_area = DB::table('codes')->where(['codegroup_id' => 'biz_area'])->get();
        $items_gubun = DB::table('codes')->where(['codegroup_id' => 'rf_gubun'])->get();
        $items_open_yn = DB::table('codes')->where(['codegroup_id' => 'open_yn'])->get();

        return view($this->list_view)->with([
            'menus' => $menus,
            'items_area' => $items_area,
            'items_biz_area' => $items_biz_area,
            'items_gubun' => $items_gubun,
            'items_open_yn' => $items_open_yn,
            'project_count' => $project_count,
            'projects' => $projects
        ]);
    }

    //-------------------------------------------
    public function loadMore(Request $request)
	{
        $r = $request->input();
        $page = $r['page'];
        $lang = $this->getLanguage();

        $biz_area = '02';
        if (isset($r['biz_area']))
        {
            $biz_area = $r['biz_area'];
        }

        $page = $r['page'];
        if ($page == '1')
        {
            $request['page'] = '2';
        }

        $items = $this->getContentSql($request);
		if (isset($items[0]) && $request->ajax())
        {
            $html = '';
            $count = 0;

			foreach ($items as $item)
            {
                //더 보기에 대한 html을 리턴한다.
                //     <li>
                //       <a href="{{ url('main-project-detail?id='.$item->id) }}">
                //         <picture>
                //           <source media="(max-width: 1024px)" srcset="/images/project/img-pj2-01-m.png">
                //           <img src="/images/project/img-pj2-01.png" alt="부산 연산 트레이더스">
                //         </picture>
                //         <em class="sg-text-06">부산 연산 트레이더스</em>
                //         <span class="sg-text-10">2017.09 ~ 2021.01</span>
                //       </a>
                //     </li>

                $arrfiles = (new FileController)->show($item->attach_id);

                $file_token = null;
                $files = null;
                if(isset($arrfiles))
                {
                    $file_token = $arrfiles['file_token'];
                    $files = $arrfiles['files'];
                }

                $html.= '<li><a href="'.'main-project-detail?id='.$item->id.'">';
                $html.= '<picture>';

                if (isset($file_token) && isset($files))
                {
                    $thumb_image = null;
                    $thumb_mo_image = null;

                    foreach($files as $it)
                    {
                        switch($it['file_view_id'])
                        {
                            case '#thumb_image'    : $thumb_image    = $it['file_nm']; break;
                            case '#thumb_mo_image' : $thumb_mo_image = $it['file_nm']; break;
                        }
                    }

                    $html.= '<source media="(max-width: 1024px)" srcset="/download/'.$file_token.'_'.$thumb_mo_image.'">';
                    $html.= '<img src="/download/'.$file_token.'_'.$thumb_image.'" alt="'.$item->name.'">';

                    $count++;
                }
                else
                {
                    $html.= '<source media="(max-width: 1024px)" srcset="">';
                    $html.= '<img src="" alt="'.$item->name.'">';
                }

                $html.= '</picture>';
                $html.= '<em class="sg-text-06">'.$item->name.'</em>';

                $html.= '<span class="sg-text-10">'.date('Y-m', strtotime($item->from)).' ~ ';

                if ($item->project_yn == 'Y')
                {
                    $html.= ($lang=='ko')? '진행중' : 'under contstruction';
                }
                else
                {
                    $html.= date('Y-m', strtotime($item->to)).'</span>';
                }

                $html.= '</a></li>';
			}

            $json = json_decode(json_encode($items));
            if ($json->current_page == $json->last_page)
            {
                $count = 0;
            }

            // $items_count = DB::table($this->table)->count();

            return $this->handle_ok("OK", [
                'count'=>$count,
                'items_more' => ($count==0)?0:1,
                'html'=>$html
            ]);
		}

        return $this->handle_ok("OK", [
            'count'=> 0,
            'items_more' => 0,
            'html'=> null
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
    // 프로젝트 콘텐트 목록 조회
    public function getContentSql(Request $request)
    {
        //프로젝트 카테고리별 구분이 다름.
        $r = $request->input();

        $lang = $this->getLanguage();

        $biz_area = '02';
        if (isset($r['biz_area']))
        {
            $biz_area = $r['biz_area'];
        }

        $gubun = '01';
        if (isset($r['gubun']))
        {
            $gubun = $r['gubun'];
        }

        $q = null;
        $items = null;
        $where = array();

        if ( isset($lang) )
        {
            $q = DB::table($this->table);
            if ($lang == 'ko')
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id = 'biz_area' AND code_id=biz_area) AS category"),
                    DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id = 'bf_gubun' AND code_id=gubun) AS gubun"),
                    'main_yn',
                    'project_yn',
                    'name_ko as name',
                    'desc_ko as desc',
                    'address_ko as address',
                    'volumn_ko as volumn',
                    'attach_id',
                    'from',
                    'to'
                );
            }
            else
            {
                $q = $q->select(
                    'id',
                    DB::raw("(SELECT code_nm FROM codes WHERE codegroup_id = 'biz_area' AND code_id=biz_area) AS category"),
                    DB::raw("(SELECT code_nm_en FROM codes WHERE codegroup_id = 'bf_gubun' AND code_id=gubun) AS gubun"),
                    'main_yn',
                    'project_yn',
                    'name_en as name',
                    'desc_en as desc',
                    'address_en as address',
                    'volumn_en as volumn',
                    'attach_id',
                    'from',
                    'to'
                );
            }

            if (isset($biz_area) && $biz_area != '01')
            {
                //실제 전체는 없음.
                $where['biz_area'] = $biz_area;
            }

            //구분이 전체이면 main_yn은 빼야 함.
            if (isset($gubun) && $gubun != '01')
            {
                $where['gubun'] = $gubun;
            }

            if (count($where) > 0)
            {
                $q = $q->where($where);
            }

            $sql = $q;

            //구분이 전체일때는 main_yn은 빼야 함.
            if ($gubun == '01')
            {
                $sql = $sql->where(function($q)
                {
                    return $q->where('main_yn', '<>', 'Y');
                });
            }

            //전체 또는 한글
            //open_yn => 01:전체, 02:국문, 03:영문, 04:비공개
            if ($lang == 'ko')
            {
                $sql = $sql->where(function($q)
                {
                    return $q->where('open_yn','01')->orWhere('open_yn','02');
                });
            }
            else
            {
                $sql = $sql->where(function($q)
                {
                    return $q->where('open_yn','01')->orWhere('open_yn','03');
                });
            }

            //나중에 등록된 것이 가장 먼저 나오도록
            $sql = $sql
                    ->orderBy('main_yn', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::LOAD_MORE);

            $items = $sql->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.
        }

        return $items;
    }

    //-------------------------------------------
    // 프로젝트 콘텐트 목록 조회
    public function getContentList(Request $request)
    {
        $r = $request->input();
        $lang = $this->getLanguage();

        $count = 1;

        $biz_area = '02';
        if (isset($r['biz_area']))
        {
            $biz_area = $r['biz_area'];
        }

        $gubun = '01';
        if (isset($r['gubun']))
        {
            $gubun = $r['gubun'];
        }

        $items = null;
        $category = $this->getCategory($biz_area);

        if ( isset($lang) )
        {
            $items = $this->getContentSql($request);

            $items_file = array();
            foreach($items as $item)
            {
                $arrfiles = (new FileController)->show($item->attach_id);
                if (isset($arrfiles))
                {
                    $arrfiles['attach_id'] = $item->attach_id;
                    array_push($items_file, $arrfiles);
                }
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
        }

        // $key = '';
        // switch($biz_area)
        // {
        //     default:
        //     case '02': $key = 'rf'; break; //주거시설
        //     case '03': $key = 'bf'; break; //건축시설
        //     case '04': $key = 'cf'; break; //토목시설
        //     case '05': $key = 'lb'; break; //레저사업
        // }

        // $title_1 = __('project.title_'.$key.'_1');
        // $title_2 = __('project.title_'.$key.'_2');

        $title_3 = null;
        $title_4 = null;

        $if = Information::find(1);

        if (isset($if))
        {
            // 'title_rf_1' => '15년간 45건 프로젝트 수행', => hf_age hf_project
            // 'title_rf_2' => '총 공사비 2조 3천억', => hf_amt

            // 'title_bf_1' => '20년간 459건 프로젝트 수행', => cf_age cf_project
            // 'title_bf_2' => '총 공사비 12조 6천억', => cf_amt

            // 'title_cf_1' => '19년간 61건 프로젝트 수행', => ce_age ce_project
            // 'title_cf_2' => '총 공사비 6천억', => ce_amt

            // 'title_lb_1' => '28년간 골프장 2개 운영', => lb_age lb_count
            // 'title_lb_2' => '총 64만평 규모', => lb_amt

            if ($lang == 'ko')
            {
                switch($biz_area)
                {
                    default:
                    case '02': //주거시설
                        $title_1 = '<span>'.$if->hf_age.'</span>년간 <span>'.$if->hf_project.'</span>건  <br class="mobile-only">프로젝트 수행';
                        $title_2 = '총 공사비 <span>'.$if->hf_amt.'</span>';
                        break;
                    case '03': //건축시설
                        $title_1 = '<span>'.$if->cf_age.'</span>년간 <span>'.$if->cf_project.'</span>건  <br class="mobile-only">프로젝트 수행';
                        $title_2 = '총 공사비 <span>'.$if->cf_amt.'</span>';
                        break;
                    case '04': //토목시설
                        $title_1 = $if->ce_age.'년간 '.$if->ce_project.'건 프로젝트 수행';
                        $title_2 = '총 공사비 <span>'.$if->ce_amt.'</span>';
                        break;
                    case '05': //레저사업
                        $title_1 = '<span>'.$if->lb_age.'</span>년간 골프장 <br class="mobile-only"><span>'.$if->lb_count.'</span>개 운영';
                        $title_2 = '총 '.$if->lb_amt.' 규모';
                        $title_3 = '<span>'.$if->ent_age.'</span>년간 아쿠아필드 <br class="mobile-only"><span>'.$if->ent_count.'</span>개 운영';
                        $title_4 = '총 <span>'.$if->ent_amt.'</span> 규모</span>';
                        break;
                }
            }
            else
            {

                // 'title_rf_1' => '45 projects in 15 years',
                // 'title_rf_2' => 'Total construction cost of KRW 2.3 trillion',

                // 'title_bf_1' => '459 projects in 20 years',
                // 'title_bf_2' => 'Total construction cost of KRW12.6 trillion',

                // 'title_cf_1' => '61 projects in 19 years',
                // 'title_cf_2' => 'Total construction cost of KRW600 billion',

                // 'title_lb_1' => 'Operated two Country Clubs over 28 years',
                // 'title_lb_2' => 'Total land size of 640,000 pyeong (2,115,702m2)',

                switch($biz_area)
                {
                    default:
                    case '02': //주거시설
                        $title_1 = '<span>'.$if->hf_project.'</span> projects in <span>'.$if->hf_age.'</span> years';
                        $title_2 = 'Total construction cost of <span>'.$if->hf_amt_en.'</span>';
                        break;
                    case '03': //건축시설
                        $title_1 = '<span>'.$if->cf_project.'</span> projects in <span>'.$if->cf_age.'</span> years';
                        $title_2 = 'Total construction cost of <span>'.$if->cf_amt_en.'</span>';
                        break;
                    case '04': //토목시설
                        $title_1 = '<span>'.$if->ce_project.'</span> projects in <span>'.$if->ce_age.'</span> years';
                        $title_2 = 'Total construction cost of <span>'.$if->ce_amt_en.'</span>';
                        break;
                    case '05': //레저사업
                        $title_1 = 'Operated <span>'.$if->lb_count.' Country Clubs <br class="pc-only">over <span>'.$if->lb_age.'</span> years';
                        $title_2 = 'Total land size of <span>'.$if->lb_amt_en.'</span>';
                        $title_3 = 'Operated <span>'.$if->ent_count.'</span> Aquafields <br class="pc-only">over <span>'.$if->ent_count.'</span> years';
                        $title_4 = 'Total land size of <span>'.$if->ent_amt_en.'</span>';
                        break;
                }
            }
        }

        $items_count = DB::table($this->table)->count();

        $json = json_decode(json_encode($items));
        if ($json->current_page == $json->last_page)
        {
            $count = 0;
        }
        else
        {
            $count = $json->per_page;
        }

        //구분이 전체일때는 main_yn은 빼야 함.
        //별도로 조회를 해서 넘겨야 한다.
        $main_item = null;
        if ($gubun == '01')
        {
            $main_item = $this->getItems($biz_area);

            // dd($main_item);
        }

        return view('main.'.$lang.'.project.pj_list')->with([
            'modal' => false,
            'title_1' => $title_1,
            'title_2' => $title_2,
            'title_3' => $title_3,
            'title_4' => $title_4,
            'biz_area' => $biz_area,
            'gubun' => $gubun,
            'category' => $category,
            'main_item' => $main_item,
            'items_gubun' => $items_gubun,
            'items_file' => $items_file,
            'items_count' => $items_count,
            'items_more' => ($count==0)?0:1,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    // 프로젝트 콘텐트 상세 조회
    public function getContentDetail(Request $request)
    {
        $r = $request->input();
        $lang = $this->getLanguage();

        $category = null;
        $item = null;
        $item_files = null;
        $items = null; //동일 카테고리내 목록.
        $items_files = null;

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = Project::find($id);
            if ( isset($item->attach_id) && $item->attach_id > 0 )
            {
                $item_files = (new FileController)->downloadList($item->attach_id);
            }

            if ( isset($item->biz_area) && isset($item->gubun) )
            {
                $biz_area = $item->biz_area;
                $gubun = $item->gubun;
                // $items = Project::where(['biz_area'=>$biz_area, 'gubun'=>$gubun])->get();
                $items = Project::where('biz_area', $biz_area)->get();

                $items_files = array();
                foreach($items as $it)
                {
                    if ( isset($it->attach_id) && $it->attach_id > 0 )
                    {
                        $it_files = (new FileController)->downloadList($it->attach_id);
                        array_push($items_files, $it_files);
                    }
                }

                $category = $this->getCategory($biz_area);
            }
        }

        return view('main.'.$lang.'.project.dt_layout')->with([
            'lang' => $lang,
            'category' => $category,
            'item' => $item,
            'item_files' => $item_files,
            'items' => $items,
            'items_files' => $items_files
        ]);
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        $area = $r['area'];
        $biz_area = $r['biz_area'];

        $where = array();
        if (isset($area) && $area != '01')
        {
            $where['area'] = $area;
        }
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

        // $test = urlencode("area=01&biz_area=02&gubun=03&from=2021-12-25&to=2021-12-25&open_yn=01&page=4");
        // Log::debug('urlencode => '.$test);
        // // urldecode($test);
        // Log::debug('urldecode => '.urldecode($test));

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
            $q = $q->where('name_'.$this->getLanguage(), 'LIKE', '%'.$searchText.'%')
                    ->orWhere('desc_'.$this->getLanguage(), 'LIKE', '%'.$searchText.'%');
        }

        $projects = $q->orderBy('created_at', 'desc')->paginate(self::PAGE_LIMIT)

        //페이지를 바로 호출할 경우 참조.
        ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.
        $project_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_area     = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
        $items_biz_area = DB::table('codes')->where(['codegroup_id' => 'biz_area'])->get();
        $items_open_yn  = DB::table('codes')->where(['codegroup_id' => 'open_yn'])->get();
        $items_gubun = DB::table('codes')->where(['codegroup_id' => $codegroup_id])->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_area' => $items_area,
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
        $file_token = null;
        $files = null;

        if ( !empty($id) )
        {
            $project = Project::find($id);
            if (isset($project))
            {
                $user = User::find($project->created_id);
                if ( isset($user) )
                {
                    $project->created_id = $user->name;
                    $user = User::find($project->updated_id);
                    $project->updated_id = $user->name;
                }

                //다운로드 첨부파일 정보 읽기.
                if ($project->attach_id > 0)
                {
                    $arrfiles = (new FileController)->show($project->attach_id);
                    if (isset($arrfiles))
                    {
                        $file_token = $arrfiles['file_token'];
                        $files = $arrfiles['files'];
                    }
                }
            }
        }

        //공통코드 조회
        $items_area     = DB::table('codes')->where(['codegroup_id' => 'area'])->get();
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
            'items_area' => $items_area,
            'items_biz_area' => $items_biz_area,
            'items_gubun' => $items_gubun,
            'items_open_yn' => $items_open_yn,
            'items_main_yn' => $items_main_yn,
            'project' => $project,
            'file_token' => $file_token,
            'files' => $files
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
            if ( !empty($id) )
            {
                $project = Project::find($id);
                if(isset($request->attach_id) && $request->attach_id > 0)
                {
                    //이 경우는 기존 파일을 삭제해야 한다(기존 파일 삭제하고, 새로 등록).
                    if ($project->attach_id > 0)
                    {
                        (new FileController)->delete($project->attach_id);
                    }

                    $project->attach_id = $request->attach_id;
                }
            }
            else
            {
                $project = new Project();

                if ( isset($request->attach_id) )
                {
                    $project->attach_id = $request->attach_id;
                }
                else
                {
                    $project->attach_id = 0;
                }
            }

            $project->area          = $request->area;
            $project->biz_area      = $request->biz_area;
            $project->gubun         = $request->gubun;
            $project->name_ko       = $request->name_ko;
            $project->name_en       = $request->name_en;
            $project->desc_ko       = $request->desc_ko;
            $project->desc_en       = $request->desc_en;
            $project->address_ko    = $request->address_ko;
            $project->address_en    = $request->address_en;
            $project->volumn_ko     = $request->volumn_ko;
            $project->volumn_en     = $request->volumn_en;
            if (isset($request->household_ko))
            {
                $project->household_ko = $request->household_ko;
            }
            if (isset($request->household_en))
            {
                $project->household_en = $request->household_en;
            }
            $project->from          = $request->from;
            $project->to            = $request->to;
            $project->open_yn       = $request->open_yn;
            $project->main_yn       = $request->main_yn;
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

        return $this->handle_ok("프로젝트가 등록되었습니다.", ['id'=>$project->id]);
    }

}
