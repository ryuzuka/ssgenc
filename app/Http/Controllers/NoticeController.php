<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Code;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\FileController;

class NoticeController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'notice';
    const __TABLE__ = 'notices';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE1 =
        '(SELECT code_nm FROM codes WHERE codegroup_id = "news_gubun" AND code_id=news_gubun) AS news_gubun
        ,(SELECT code_nm FROM codes WHERE codegroup_id = "shortcut_expo_yn" AND code_id=shortcut_expo_yn) AS shortcut_expo_yn
        ,(SELECT code_nm FROM codes WHERE codegroup_id = "expo_yn" AND code_id=expo_yn) AS expo_yn';

    protected $rules =
        [
            'news_gubun'    => 'required',
            'subject'       => 'required',
            'created_at'    => 'required',
            'expo_yn'       => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\Notice');
    }

    //-------------------------------------------
    public function getContentList(Request $request)
    {
        $r = $request->input();

        $q = DB::table($this->table);
        $items_count = $q->count();

        $items =
            $q->select(
                'id',
                'subject',
                'content',
                DB::raw(self::CODE1),
                'created_at'
            )->orderBy('created_at', 'desc')->paginate(self::MAIN_PAGE_LIMIT)->appends(request()->except('page'));

        //공통코드 조회
        $items_news_gubun       = DB::table('codes')->where(['codegroup_id' => 'news_gubun'])->get();
        $items_shortcut_expo_yn = DB::table('codes')->where(['codegroup_id' => 'shortcut_expo_yn'])->get();
        $items_expo_yn          = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        return view('main.ko.information.if_01')->with([
            'items_news_gubun' => $items_news_gubun,
            'items_shortcut_expo_yn' => $items_shortcut_expo_yn,
            'items_expo_yn' => $items_expo_yn,
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
            $item = Notice::find($id);
            if(isset($item))
            {
                $news_gubun_nm = Code::where(['codegroup_id'=>'news_gubun', 'code_id'=>$item->news_gubun])->first();
                $item->{"news_gubun_nm"} = $news_gubun_nm->code_nm;

                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $files = (new FileController)->downloadList($item->attach_id);
                }
            }
        }

        $prev_item = Notice::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $next_item = Notice::where('id', '<', $id)->orderBy('id','desc')->first();

        return view('main.ko.information.if_01_01')->with([
            'item' => $item,
            'files' => $files,
            'prev_item' => $prev_item,
            'next_item' => $next_item
        ]);
    }

    //-------------------------------------------
    // 콘텐트 상세 조회
    public function getContentPressDetail(Request $request)
    {
        $r = $request->input();

        $prev_item = null;
        $next_item = null;
        $item = null;
        $files = null;

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = Notice::find($id);
            if(isset($item))
            {
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $files = (new FileController)->downloadList($item->attach_id);
                }
            }
        }

        $prev_item = Notice::where('id', '>', $id)->orderBy('id', 'asc')->first();
        $next_item = Notice::where('id', '<', $id)->orderBy('id','desc')->first();

        return view('main.ko.information.if_01_02')->with([
            'item' => $item,
            'files' => $files,
            'prev_item' => $prev_item,
            'next_item' => $next_item
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
        $where = array();
        if (isset($r['news_gubun']) && $r['news_gubun'] != '01')
        {
            $where['news_gubun'] = $r['news_gubun'];
        }

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $q = DB::table($this->table)
            ->select(
                'id',
                'subject',
                DB::raw(self::CODE1),
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

        $notices = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)
                    ->appends(request()->except('page'));

        $notice_count = DB::table($this->table)->count();

        //공통코드 조회
        $items_news_gubun   = DB::table('codes')->where(['codegroup_id' => 'news_gubun'])->get();
        $items_expo_yn      = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();
        $items_shortcut_expo_yn   = DB::table('codes')->where(['codegroup_id' => 'shortcut_expo_yn'])->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_news_gubun' => $items_news_gubun,
            'items_shortcut_expo_yn' => $items_shortcut_expo_yn,
            'items_expo_yn' => $items_expo_yn,
            'notice_count' => $notice_count,
            'notices' => $notices
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();

        $q = null;
        $notice = null;
        $file_token = null;
        $files = null;
        $where = array();
        $id = $r['id'];
        if ( !empty($id) )
        {
            $notice = Notice::find($id);
            if (isset($notice))
            {
                $user = User::where(['user_id' => $notice->created_id])->get();
                if ( isset($user[0]) )
                {
                    $notice->created_id = $user[0]->name;
                    $user = User::where(['user_id' => $notice->updated_id])->get();
                    $notice->updated_id = $user[0]->name;
                }

                $files = null;
                if (isset($notice))
                {
                    $files = (new FileController)->downloadList($notice->attach_id);
                    if(isset($files[0]))
                    {
                        $file_token = $files[0]['file_token'];
                    }
                }
            }
        }

        //공통코드 조회
        $items_news_gubun   = DB::table('codes')->where(['codegroup_id' => 'news_gubun'])->get();
        $items_expo_yn      = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();
        $items_shortcut_expo_yn   = DB::table('codes')->where(['codegroup_id' => 'shortcut_expo_yn'])->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_news_gubun' => $items_news_gubun,
            'items_shortcut_expo_yn' => $items_shortcut_expo_yn,
            'items_expo_yn' => $items_expo_yn,
            'notice' => $notice,
            'file_token' => $file_token,
            'files' => $files
        ]);
    }

    //-------------------------------------------
    public function show(Request $request)
    {
        $r = $request->input();

        $where = array();
        if (isset($r['news_gubun']) && $r['news_gubun'] != '01')
        {
            array_push($where, 'news_gubun', $r['news_gubun']);
        }

        // Log::debug("where => " . $where);

        $from       = $r['from'];
        $to         = $r['to'];
        $expo_yn    = $r['expo_yn'];

        $q = DB::table($this->table)
            ->select(
                'id',
                'subject',
                'content',
                DB::raw(self::CODE1),
                'created_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        // $q = $q->whereBetween('created_at', [$from, $to]);
        $q = $q->where('created_at', '>=', $from);
        $q = $q->where('created_at', '<=', $to);

        if ($expo_yn != '01')
        {
            $q = $q->where('expo_yn', $expo_yn);
        }

        $notices = $q->paginate(self::PAGE_LIMIT);
        return response()->json($notices);
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
                // Log::debug('id ==> '.$id);
                $notice = Notice::find($id);
                if(isset($request->image_id) && $request->image_id > 0)
                {
                    //이 경우는 기존 파일을 삭제해야 한다(기존 파일 삭제하고, 새로 등록).
                    if ($notice->image_id > 0)
                    {
                        (new FileController)->delete($notice->image_id);
                    }

                    $notice->image_id = $request->image_id;
                }
                if(isset($request->attach_id) && $request->attach_id > 0)
                {
                    //이 경우는 기존 파일을 삭제해야 한다(기존 파일 삭제하고, 새로 등록).
                    if ($notice->attach_id > 0)
                    {
                        (new FileController)->delete($notice->attach_id);
                    }

                    $notice->attach_id = $request->attach_id;
                }
            }
            else
            {
                $notice = new Notice();

                if ( isset($request->image_id) )
                {
                    $notice->image_id = $request->image_id;
                }
                else
                {
                    $notice->image_id = 0;
                }

                if ( isset($request->attach_id) )
                {
                    $notice->attach_id = $request->attach_id;
                }
                else
                {
                    $notice->attach_id = 0;
                }
            }

            $notice->news_gubun         = $request->news_gubun;
            $notice->subject            = $request->subject;
            $notice->content            = $request->content;
            $notice->expo_yn            = $request->expo_yn;
            $notice->created_at         = $request->created_at;
            $notice->youtube_url        = $request->youtube_url;
            $notice->shortcut_nm        = $request->shortcut_nm;
            $notice->shortcut_url       = $request->shortcut_url;
            $notice->shortcut_expo_yn   = $request->shortcut_expo_yn;
            $notice->created_id         = $this->getUserId();
            $notice->updated_id         = $this->getUserId();
            $notice->save();

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

        return $this->handle_ok("뉴스공지가 등록되었습니다.", ['id'=>$notice->id]);
    }

}
