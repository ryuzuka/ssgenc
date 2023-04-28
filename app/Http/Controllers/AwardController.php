<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AwardController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'award';
    const __TABLE__ = 'awards';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "expo_yn" AND code_id=expo_yn) AS expo_yn';

    protected $rules =
        [
            'agency_ko' => 'required',
            'agency_en' => 'required',
            'subject_ko' => 'required',
            'subject_en' => 'required',
            'registed_at' => 'required',
            'expo_yn' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Award');
    }

    //-------------------------------------------
    // 수상/인증 콘텐트 목록 조회
    public function getContentList(Request $request)
    {
        $r = $request->input();
        $lang = $this->getLanguage();

        $count = 1;

        $gubun = '01';
        if (isset($r['gubun']))
        {
            $gubun = $r['gubun'];
        }

        $items = null;
        if ( isset($lang) )
        {
            $items = Award::where(['gubun'=>$gubun, 'expo_yn'=>'Y'])
                    ->orderBy('registed_at', 'desc')
                    ->paginate(self::LOAD_MORE)
                    ->appends(request()->except('gubun'));

            if (isset($items))
            {
                foreach($items as $item)
                {
                    $item->{"main_image"} = "/images/information/img-if2-blank.png";
                    $item->{"main_mo_image"} = "/images/information/img-if2-blank-m.png";

                    if (isset($item->attach_id) && $item->attach_id>0)
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
                }
            }

            // dd($items);
        }

        $items_award_count = DB::table($this->table)->where(['gubun'=>'01', 'expo_yn'=>'Y'])->count();
        $items_cert_count = DB::table($this->table)->where(['gubun'=>'02', 'expo_yn'=>'Y'])->count();
        $items_count = ($gubun=='01')?$items_award_count:$items_cert_count;

        $json = json_decode(json_encode($items));
        if ($json->current_page == $json->last_page)
        {
            $count = 0;
        }

        $page_frefix = null;
        if ($gubun == '01')
        {
            $page_frefix = 'awards';
        }
        else
        {
            $page_frefix = 'certifications';
        }

        return view('main.'.$lang.'.information.'.$page_frefix)->with([
            'lang' => $lang,
            'items_award_count' => $items_award_count,
            'items_cert_count' => $items_cert_count,
            'gubun' => $gubun,
            'items_count' => $items_count,
            'items_more' => ($count==0)?0:1,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function loadMore(Request $request)
	{
        $r = $request->input();
        $page = $r['page'];
        $lang = $this->getLanguage();

        $gubun = '01';
        if (isset($r['gubun']))
        {
            $gubun = $r['gubun'];
        }

        $page = $r['page'];
        if ($page == '1')
        {
            $request['page'] = '2';
        }

        $items = Award::where(['gubun'=>$gubun, 'expo_yn'=>'Y'])
                ->orderBy('registed_at', 'desc')->paginate(self::LOAD_MORE)
                ->appends(request()->except('page'));
		if (isset($items[0]) && $request->ajax())
        {
            $html = '';
            $count = 0;

			foreach ($items as $item)
            {
                //더 보기에 대한 html을 리턴한다.

                //수상
                // <li>
                //     <picture>
                //      <source media="(max-width: 1024px)" srcset="/images/information/img-if2-19-m.png">
                //      <img src="/images/information/img-if2-19.png" alt="노사문화 우수기업 노동부장관상">
                //     </picture>
                //     <em>노사문화 우수기업 노동부장관상</em>
                //     <div class="agency">
                //      <span>주관기관</span>
                //      <span>노동부</span>
                //     </div>
                //     <span class="date">2005.09.14</span>
                // </li>

                //인증
                // <li>
                //     <picture>
                //      <source media="(max-width: 1024px)" srcset="/images/information/img-if2-2-01-m.png">
                //      <img src="/images/information/img-if2-2-01.png" alt="ISO 14001 (환경경영시스템 인증)">
                //     </picture>
                //     <span class="badge">인증서</span>
                //     <em>ISO 14001 (환경경영시스템 인증)</em>
                //     <div class="agency">
                //      <span>주관기관</span>
                //      <span>한국품질재단</span>
                //     </div>
                //     <span class="date">2020.10.20</span>
                // </li>

                $arrfiles = null;
                if ( isset($item->attach_id) && $item->attach_id>0 )
                {
                    $arrfiles = (new FileController)->show($item->attach_id);
                }

                $file_token = null;
                $files = null;
                if(isset($arrfiles))
                {
                    $file_token = $arrfiles['file_token'];
                    $files = $arrfiles['files'];
                }

                $html.= '<li>';
                $html.= '<picture>';

                if (isset($file_token) && isset($files))
                {
                    $main_image = null;
                    $main_mo_image = null;

                    foreach($files as $it)
                    {
                        switch($it['file_view_id'])
                        {
                            case '#main_image'    : $main_image    = $it['file_nm']; break;
                            case '#main_mo_image' : $main_mo_image = $it['file_nm']; break;
                        }
                    }

                    if (isset($main_image) && isset($main_mo_image))
                    {
                        $html.= '<source media="(max-width: 1024px)" srcset="/download/'.$file_token.'_'.$main_mo_image.'">';
                        $html.= '<img src="/download/'.$file_token.'_'.$main_image.'" alt="'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'">';
                    }
                    else
                    {
                        $html.= '<source media="(max-width: 1024px)" srcset="/images/information/img-if2-blank-m.png">';
                        $html.= '<img src="/images/information/img-if2-blank.png" alt="'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'">';
                    }

                    $count++;
                }
                else
                {
                    $html.= '<source media="(max-width: 1024px)" srcset="/images/information/img-if2-blank-m.png">';
                    $html.= '<img src="/images/information/img-if2-blank.png" alt="'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'">';
                }

                $html.= '</picture>';

                $html.= '<em>'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'</em>';

                if ($gubun == '02')
                {
                    $html.= '<span class="badge">'.(($lang=='ko')?'인증서':'Certificate').'</span>';
                }

                $html.= '<div class="agency">';
                $html.= '<span>'.(($lang=='ko')?'주관기관':'Hosted').'</span>';
                $html.= '<span>'.(($lang=='ko')?$item->agency_ko:$item->agency_en).'</span>';
                $html.= '</div>';

                $html.= '<span class="date">'.date('Y-m', strtotime($item->registed_at)).'</span>';
                $html.= '</li>';
			}

            $json = json_decode(json_encode($items));
            if ($json->current_page == $json->last_page)
            {
                $count = 0;
            }

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
        $lang = $this->getLanguage();

        $items      = null;
        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $gubun      = $this->checkDefault($r, 'gubun', '01');
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        if ( isset($lang) )
        {
            $q = DB::table($this->table);
            if ($lang == 'ko')
            {
                $q = $q->select(
                    'id',
                    'gubun',
                    DB::raw(self::CODE),
                    'agency_ko as agency',
                    'subject_ko as subject',
                    'registed_at'
                );
            }
            else
            {
                $q = $q->select(
                    'id',
                    'gubun',
                    DB::raw(self::CODE),
                    'agency_en as agency',
                    'subject_en as subject',
                    'registed_at'
                );
            }

            $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
            $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
            $q = $q->whereBetween('registed_at', [$from, $to]);

            if ( isset($gubun) )
            {
                $q = $q->where('gubun', $gubun);
            }

            if ( isset($expo_yn) )
            {
                $q = $q->where('expo_yn', $expo_yn);
            }

            if (isset($searchText))
            {
                //제목 키워드
                $q = $q->where(($lang=='ko')?'subject_ko':'subject_en', 'LIKE', '%'.$searchText.'%');
            }

            //page만 제외하고, 나머지 파라메터를 붙임.
            $items = $q->orderBy('created_at', 'desc')->paginate(self::PAGE_LIMIT)->appends(request()->except('page'));
        }

        $items_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'gubun' => $gubun,
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

        $id = $r['id'];
        $gubun = $r['gubun'];
        if ( isset($id) )
        {
            $item = Award::find($id);
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
            'gubun' => $gubun,
            'items_expo_yn' => $items_expo_yn,
            'item' => $item,
            'file_token' => $file_token,
            'files' => $files
        ]);
    }
}
