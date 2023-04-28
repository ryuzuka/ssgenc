<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Code;
use App\Models\User;
use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\FileController;

class ContributionController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'csr';
    const __TABLE__ = 'contributions';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "contrib" AND code_id=contrib) AS contrib';

    protected $rules =
        [
            'contrib' => 'required',
            'subject_ko' => 'required',
            'subject_en' => 'required',
            'content_ko' => 'required',
            'content_en' => 'required',
            'created_at' => 'required',
            'expo_yn' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Contribution');
    }

    //-------------------------------------------
    public function getItems()
    {
        $lang = $this->getLanguage();

        $items = Contribution::all()->sort();
        foreach($items as $item)
        {
            $code = Code::where(['codegroup_id'=>'contrib', 'code_id'=>$item->contrib])->first();
            if (isset($code))
            {
                $item->{"contrib_nm"} = ($lang=='ko')?$code->code_nm:$code->code_nm_en;
            }

            if (isset($item) && $item->attach_id>0)
            {
                $files = (new FileController)->downloadList($item->attach_id);
                if (isset($files))
                {
                    foreach($files as $f)
                    {
                        if($f['file_view_id'] === '#thumb_image')
                        {
                            $item->{"thumb_image"} = $f['file_path'];
                        }
                        else if ($f['file_view_id'] === '#thumb_mo_image')
                        {
                            $item->{"thumb_mo_image"} = $f['file_path'];
                        }
                    }
                }
            }
        }

        // dd($items);

        return isset($items)? $items : null;
    }

    //-------------------------------------------
    // 콘텐트 목록 조회
    public function getContentList(Request $request)
    {
        $r = $request->input();
        $lang = $this->getLanguage();

        $items      = null;

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');

        $where = array();

        $q = DB::table($this->table);
        $q = $q->select(
            'id',
            'contrib',
            'subject_ko',
            'subject_en',
            'content_ko',
            'content_en',
            'attach_id',
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
                ->paginate(self::LOAD_MORE)
                ->appends(request()->except('page'));

        if (isset($items))
        {
            foreach($items as $item)
            {
                $code = Code::where(['codegroup_id'=>'contrib', 'code_id'=>$item->contrib])->first();
                if (isset($code))
                {
                    $item->{"contrib_nm"} = ($lang=='ko')?$code->code_nm:$code->code_nm_en;
                }

                if (isset($item) && $item->attach_id>0)
                {
                    $files = (new FileController)->downloadList($item->attach_id);
                    if (isset($files))
                    {
                        foreach($files as $f)
                        {
                            if($f['file_view_id'] === '#thumb_image')
                            {
                                $item->{"thumb_image"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#thumb_mo_image')
                            {
                                $item->{"thumb_mo_image"} = $f['file_path'];
                            }
                        }
                    }
                }
            }
        }

        $count = 1;

        $json = json_decode(json_encode($items));
        if ($json->current_page == $json->last_page)
        {
            $count = 0;
        }
        else
        {
            $count = $json->per_page;
        }

        return view('main.'.App::getLocale().'.csr.cr_01_03')->with([
            'items_more' => ($count==0)?0:1,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    // 콘텐트 상세 조회
    public function getContentDetail(Request $request)
    {
        $r = $request->input();
        $lang = $this->getLanguage();

        $item = null;

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = Contribution::find($id);
            if (isset($item))
            {
                // dd($item);
                $code = Code::where(['codegroup_id'=>'contrib', 'code_id'=>$item->contrib])->first();
                if (isset($code))
                {
                    $item->{"contrib_nm"} = ($lang=='ko')?$code->code_nm:$code->code_nm_en;
                }

                if (isset($item) && $item->attach_id>0)
                {
                    $files = (new FileController)->downloadList($item->attach_id);
                    if (isset($files))
                    {
                        foreach($files as $f)
                        {
                            if($f['file_view_id'] === '#thumb_image')
                            {
                                $item->{"thumb_image"} = $f['file_path'];
                            }
                            else if($f['file_view_id'] === '#detail_image_1')
                            {
                                $item->{"detail_image_1"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#detail_image_2')
                            {
                                $item->{"detail_image_2"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#thumb_mo_image')
                            {
                                $item->{"thumb_mo_image"} = $f['file_path'];
                            }
                            else if($f['file_view_id'] === '#detail_mo_image_1')
                            {
                                $item->{"detail_mo_image_1"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#detail_mo_image_2')
                            {
                                $item->{"detail_mo_image_2"} = $f['file_path'];
                            }
                        }
                    }
                }
            }
        }

        $items = Contribution::all();
        if (isset($items))
        {
            foreach($items as $it)
            {
                $code = Code::where(['codegroup_id'=>'contrib', 'code_id'=>$it->contrib])->first();
                if (isset($code))
                {
                    $it->{"contrib_nm"} = ($lang=='ko')?$code->code_nm:$code->code_nm_en;
                }

                if (isset($it) && $it->attach_id>0)
                {
                    $files = (new FileController)->downloadList($it->attach_id);
                    if (isset($files))
                    {
                        foreach($files as $f)
                        {
                            if($f['file_view_id'] === '#thumb_image')
                            {
                                $it->{"thumb_image"} = $f['file_path'];
                            }
                            else if ($f['file_view_id'] === '#thumb_mo_image')
                            {
                                $it->{"thumb_mo_image"} = $f['file_path'];
                            }
                        }
                    }
                }
            }
        }

        return view('main.'.App::getLocale().'.csr.cr_01_03_dtl')->with([
            'item' => $item,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function loadMore(Request $request)
	{
        $r = $request->input();
        $lang = $this->getLanguage();

        $page = $r['page'];
        if ($page == '1')
        {
            $request['page'] = '2';
        }

        $items = Contribution::where('expo_yn','Y')
                ->orderBy('created_at', 'desc')
                ->paginate(self::LOAD_MORE);


	if (isset($items[0]) && $request->ajax())
        {
            $html = '';
            $count = 0;

			foreach ($items as $item)
            {
                //더 보기에 대한 html을 리턴한다.
                // <li>
                //     <a href="/html/csr/cr_01_03_dt06.html">
                //     <picture>
                //         <source media="(max-width: 1024px)" srcset="/images/csr/img-cr3-list06-m.png">
                //         <img src="/images/csr/img-cr3-list06.png" alt="성균관 문묘 지킴이 / 문화재 지킴이 활동">
                //     </picture>
                //     <em>성균관 문묘 지킴이</em>
                //     <span>문화재 지킴이 활동</span>
                //     </a>
                // </li>

                $arrfiles = (new FileController)->show($item->attach_id);

                $file_token = null;
                $files = null;
                if(isset($arrfiles))
                {
                    $file_token = $arrfiles['file_token'];
                    $files = $arrfiles['files'];
                }

                $html.= '<li>';
                $html.= '<a href="'.'social-contribution-dtl?id='.$item->id.'">';
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
                    $html.= '<img src="/download/'.$file_token.'_'.$thumb_image.'" alt="'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'">';

                    $count++;
                }
                else
                {
                    $html.= '<source media="(max-width: 1024px)" srcset="">';
                    $html.= '<img src="" alt="'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'">';
                }

                $html.= '</picture>';

                $html.= '<em>'.(($lang=='ko')?$item->subject_ko:$item->subject_en).'</em>';
                $html.= '<span>'.(($lang=='ko')?$item->agency_ko:$item->agency_en).'</span>';
                $html.= '</a>';
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
        // $lang = $this->getLanguage();
        $lang = 'ko';

        $where = array();
        if (isset($r['contrib']) && $r['contrib'] != '00')
        {
            $where['contrib'] = $r['contrib'];
        }

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        if ( isset($lang) )
        {
            $q = DB::table($this->table);
            if ($lang == 'ko')
            {
                $q = $q->select(
                    'id',
                    DB::raw(self::CODE),
                    'subject_ko as subject',
                    'content_ko as content',
                    'expo_yn',
                    'created_at'
                );
            }
            else
            {
                $q = $q->select(
                    'id',
                    DB::raw(self::CODE),
                    'subject_en as subject',
                    'content_en as content',
                    'expo_yn',
                    'created_at'
                );
            }

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
                $q = $q->where(($lang=='ko')?'subject_ko':'subject_en', 'LIKE', '%'.$searchText.'%');
            }

            //page만 제외하고, 나머지 파라메터를 붙임.
            $items = $q
                        ->orderBy('created_at', 'desc')
                        ->paginate(self::PAGE_LIMIT)->appends(request()->except('page'));
        }

        $items_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_contrib = DB::table('codes')->where(['codegroup_id' => 'contrib'])->get();
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_contrib' => $items_contrib,
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
            $item = Contribution::find($r['id']);
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
        $items_contrib = DB::table('codes')->where(['codegroup_id' => 'contrib'])->get();
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_contrib' => $items_contrib,
            'items_expo_yn' => $items_expo_yn,
            'item' => $item,
            'file_token' => $file_token,
            'files' => $files
        ]);
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
                $item = Contribution::find($id);
            }
            else
            {
                $item = new Contribution();

                $item->attach_id = $request->attach_id;
            }

            $item->contrib      = $request->contrib;
            $item->subject_ko   = $request->subject_ko;
            $item->subject_en   = $request->subject_en;
            $item->content_ko   = $request->content_ko;
            $item->content_en   = $request->content_en;
            $item->expo_yn      = $request->expo_yn;
            $item->created_at   = $request->created_at;
            $item->created_id   = $this->getUserId();
            $item->updated_id   = $this->getUserId();
            $item->save();

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

        return $this->handle_ok("등록되었습니다.", ['id'=>$item->id]);
    }

}
