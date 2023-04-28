<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\MainPopup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FileController;

class MainPopupController extends Controller
{
    const __PKG__ = 'admin.site.';
    const __CLAZZ__ = 'mainpopup';
    const __TABLE__ = 'mainpopups';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const CODE1 ='(SELECT code_nm FROM codes WHERE codegroup_id = "expo_yn" AND code_id=expo_yn) AS expo_yn';

    protected $rules =
        [
            'subject'       => 'required',
            'descript'      => 'required',
            //'link_text'     => 'required',
            'expo_yn'       => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->setModel('App\Models\MainPopup');
    }

    //-------------------------------------------
    public function getItems()
    {
        $result = MainPopup::where('expo_yn', 'Y')->get();
        return isset($result[0])? $result[0] : null;
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
            //제목 키워드 (영문은 어떻게?)
            $q = $q->where('subject', 'LIKE', '%'.$searchText.'%');
        }

        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)
                    ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.

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

        $q = null;
        $item = null;
        $file_token = null;
        $files = null;
        $where = array();

        $id = $r['id'];
        if ( isset($id) )
        {
            $where['id'] = $id;

            $item = MainPopup::where($where)->get();
            if (isset($item[0]))
            {
                $user = User::where(['user_id' => $item[0]->created_id])->get();
                if ( isset($user[0]) )
                {
                    // Log::debug('user => '.$user);
                    $item[0]->created_id = $user[0]->name;

                    $user = User::where(['user_id' => $item[0]->updated_id])->get();
                    // Log::debug('user => '.$user);
                    $item[0]->updated_id = $user[0]->name;
                }

                $item = $item[0];
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

    //-------------------------------------------
    public function show(Request $request)
    {
        $r = $request->input();

        $where = array();

        $from       = $r['from'];
        $to         = $r['to'];
        $expo_yn    = $r['expo_yn'];

        $q = DB::table($this->table)
            ->select(
                'id',
                'subject',
                'descript',
                'url',
                'link_text',
                DB::raw(self::CODE1),
                'created_at'
            );

        $q = $q->whereBetween('created_at', [$from, $to]);

        if ($expo_yn != '01')
        {
            $q = $q->where('expo_yn', $expo_yn);
        }

        $items = $q->paginate(self::PAGE_LIMIT);
        return response()->json($items);
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
                $item = MainPopup::find($id);
                if(isset($request->attach_id) && $request->attach_id > 0)
                {
                    //이 경우는 기존 파일을 삭제해야 한다(기존 파일 삭제하고, 새로 등록).
                    if ($item->attach_id > 0)
                    {
                        (new FileController)->delete($item->attach_id);
                    }

                    $item->attach_id = $request->attach_id;
                }
            }
            else
            {
                $item = new MainPopup();
                if ( isset($request->attach_id) )
                {
                    $item->attach_id = $request->attach_id;
                }
                else
                {
                    $item->attach_id = 0;
                }
            }

            $item->subject      = $request->subject;
            $item->descript     = $request->descript;
            $item->url          = $request->url;
            $item->link_text    = $request->link_text;
            $item->expo_yn      = $request->expo_yn;
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

        return $this->handle_ok("메인팝업이 등록되었습니다.", ['id'=>$item->id]);
    }

}
