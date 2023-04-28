<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Duty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DutyController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'duty';
    const __TABLE__ = 'duties';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "expo_yn" AND code_id=expo_yn) AS expo_yn';

    protected $rules =
        [
            'duty_nm' => 'required',
            'part_nm' => 'required',
            'duty_desc' => 'required',
            'interview' => 'required',
            'created_at' => 'required',
            'expo_yn' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Duty');
    }

    //-------------------------------------------
    // 직무소개 콘텐트 목록 조회
    public function getContentList(Request $request)
    {
        $r = $request->input();

        $count = 1;

        $items = Duty::where(['expo_yn'=>'Y'])
                ->orderBy('created_at', 'desc')->paginate(self::LOAD_MORE)->appends(request()->except('page'));
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

        $items_count = DB::table($this->table)->count();

        $json = json_decode(json_encode($items));
        if ($json->current_page == $json->last_page)
        {
            $count = 0;
        }

        return view('main.ko.information.if_05_03')->with([
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

        $item = null;
        $item_files = null;

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = Duty::find($id);
            if (isset($item->attach_id) && $item->attach_id>0)
            {
                $files = (new FileController)->downloadList($item->attach_id);
                if (isset($files))
                {
                    foreach($files as $f)
                    {
                        switch($f['file_view_id'])
                        {
                            case '#detail_image':
                                $item->{"detail_image"}     = $f['file_path']; break;
                            case '#detail_mo_image':
                                $item->{"detail_mo_image"}  = $f['file_path']; break;
                            case '#person_image':
                                $item->{"person_image"}     = $f['file_path']; break;
                            case '#person_mo_image':
                                $item->{"person_mo_image"}  = $f['file_path']; break;
                        }
                    }
                }
            }
        }

        //목록 정보 조회
        $items = Duty::where(['expo_yn'=>'Y'])
                ->orderBy('created_at', 'desc')->get();

        if (isset($items))
        {
            foreach($items as $it)
            {
                $files = (new FileController)->downloadList($it->attach_id);
                if (isset($files))
                {
                    foreach($files as $f)
                    {
                        switch($f['file_view_id'])
                        {
                            case '#thumb_image':
                                $it->{"thumb_image"}     = $f['file_path']; break;
                            case '#thumb_mo_image':
                                $it->{"thumb_mo_image"}  = $f['file_path']; break;
                        }
                    }
                }
            }
        }

        return view('main.ko.information.if_05_03_dtl')->with([
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

        $items = Duty::where('expo_yn', 'Y')
                ->orderBy('created_at', 'desc')->paginate(self::LOAD_MORE);
		if (isset($items[0]) && $request->ajax())
        {
            $html = '';
            $count = 0;

			foreach ($items as $item)
            {
                //더 보기에 대한 html을 리턴한다.
                // <li>
                //     <a href="job-introduction-dtl">
                //     <picture>
                //         <source media="(max-width: 1024px)" srcset="/images/information/img-if5-list01-m.png">
                //         <img src="/images/information/img-if5-list01.png" alt="">
                //     </picture>
                //     <em>인사</em>
                //     <span>인사팀</span>
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
                $html.= '<a href="job-introduction-dtl?id='.$item->id.'">';
                $html.= '<picture>';

                if (isset($file_token) && isset($files))
                {
                    $thumb_image = null;
                    $thumb_mo_image = null;

                    foreach($files as $it)
                    {
                        switch($it['file_view_id'])
                        {
                            case '#thumb_image'    : $thumb_image     = $it['file_nm']; break;
                            case '#thumb_mo_image' : $thumb_mo_image  = $it['file_nm']; break;
                        }
                    }

                    $html.= '<source media="(max-width: 1024px)" srcset="/download/'.$file_token.'_'.$thumb_mo_image.'">';
                    $html.= '<img src="/download/'.$file_token.'_'.$thumb_image.'" alt="">';

                    $count++;
                }
                else
                {
                    $html.= '<source media="(max-width: 1024px)" srcset="">';
                    $html.= '<img src="" alt="">';
                }

                $html.= '</picture>';

                $html.= '<em>'.$item->duty_nm.'</em>';
                $html.= '<span>'.$item->part_nm.'</span>';
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

        $items      = null;
        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $q = DB::table($this->table);
        $q = $q->select(
            'id',
            DB::raw(self::CODE),
            'duty_nm',
            'part_nm',
            'created_at'
        );

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if ( isset($expo_yn) )
        {
            $q = $q->where('expo_yn', $expo_yn);
        }

        if (isset($searchText))
        {
            //제목 키워드(직무명,직무설명,인터뷰 or 검색)
            $q = $q
                    ->where('duty_nm', 'LIKE', '%'.$searchText.'%')
                    ->orWhere('duty_desc', 'LIKE', '%'.$searchText.'%')
                    ->orWhere('interview', 'LIKE', '%'.$searchText.'%');
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
            $item = Duty::find($r['id']);
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
