<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\FileController;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    const __PKG__ = 'admin.site.';
    const __CLAZZ__ = 'message';
    const __TABLE__ = 'messages';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    const MSG_ACC = "(SELECT SUBSTRING_INDEX(code_nm,'(', 1) FROM codes WHERE codegroup_id='msg_acc' AND code_id=trim(msg_acc)) AS msg_acc";
    const EXPO_YN = "(SELECT code_nm FROM codes WHERE codegroup_id='expo_yn' AND code_id=expo_yn) AS expo_yn";

    private $default_err_code;

    protected $rules =
        [
            'msg_acc' => 'required',
            'key_msg_ko' => 'required',
            'key_msg_desc_ko' => 'required',
            'key_msg_en' => 'required',
            'key_msg_desc_en' => 'required'
        ];

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->default_err_code = $this->getDefaultErrCode(self::__CLAZZ__);

        $this->setModel('App\Models\Message');
    }

    //-------------------------------------------
    public function getItem()
    {
        $dt = Carbon::now()->timezone('Asia/Seoul');

        $hour = $dt->hour;
        $msg_acc = '01';
        if ( 6 <= $hour && $hour < 12 )
        {
            $msg_acc = '01';
        }
        else if ( 12 <= $hour && $hour < 18 )
        {
            $msg_acc = '02';
        }
        else
        {
            $msg_acc = '03';
        }

        // $items = Message::where(['msg_acc'=>$msg_acc, 'expo_yn'=>'Y'])->get();
        $items = Message::where('expo_yn', 'Y')->get();

        // $keyimg = (new FileController)->downloadList($keymsg->attach_id);

        if (isset($items))
        {
            foreach($items as $item)
            {
                if ($item->msg_acc == $msg_acc)
                {
                    $item->{"first_view"} = true;
                }
                else
                {
                    $item->{"first_view"} = false;
                }

                if (isset($item) && $item->attach_id>0)
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

        // dd($items);

        return isset($items)? $items : null;
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
        if (isset($r['msg_acc']) && $r['msg_acc'] != '00')
        {
            $where['msg_acc'] = $r['msg_acc'];
        }

        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $expo_yn    = $this->checkDefault($r, 'expo_yn', 'Y');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $lang       = 'ko';

        $q = DB::table($this->table)
            ->select(
                'id',
                DB::raw(self::MSG_ACC),
                DB::raw(self::EXPO_YN),
                'key_msg_ko',
                'key_msg_en',
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
            $q = $q->where(($lang=='ko')?'key_msg_ko':'key_msg_en', 'LIKE', '%'.$searchText.'%');
        }

        //page만 제외하고, 나머지 파라메터를 붙임.
        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)
                    ->appends(request()->except('page'));

        $items_count = DB::table($this->table)->count();

        // Log::debug("messages => " . $items);

        //공통코드 조회
        $items_msg_acc = DB::table('codes')->where(['codegroup_id' => 'msg_acc'])->get();
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_msg_acc' => $items_msg_acc,
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
        $id = $r['id'];
        if ( isset($id) )
        {
            $item = Message::find($id);
            if (isset($item))
            {
                $user = User::find($item->created_id);
                if ( isset($user) )
                {
                    $item->created_id = $user->name;
                    $user = User::find($item->updated_id);
                    if ( isset($user) )
                    {
                        $item->updated_id = $user->name;
                    }
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
        $items_msg_acc = DB::table('codes')->where(['codegroup_id' => 'msg_acc'])->get();
        $items_expo_yn = DB::table('codes')->where(['codegroup_id' => 'expo_yn'])->orderBy('code_id','desc')->get();

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_msg_acc' => $items_msg_acc,
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
        if (isset($r['msg_acc']) && $r['msg_acc'] != '00')
        {
            array_push($where, 'msg_acc', $r['msg_acc']);
        }

        // Log::debug("where => " . $where);

        $from       = $r['from'];
        $to         = $r['to'];
        $expo_yn    = $r['expo_yn'];

        $q = DB::table($this->table)
            ->select(
                'id',
                DB::raw(self::MSG_ACC),
                DB::raw(self::EXPO_YN),
                'key_msg_ko',
                'key_msg_en',
                'created_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

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
            if ( !empty($id) )
            {
                $item = Message::find($id);

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
                $item = new Message();

                if ( isset($request->attach_id) )
                {
                    $item->attach_id = $request->attach_id;
                }
                else
                {
                    $item->attach_id = 0;
                }
            }

            $item->msg_acc            = $request->msg_acc;
            $item->key_msg_ko         = $request->key_msg_ko;
            $item->key_msg_desc_ko    = $request->key_msg_desc_ko;
            $item->key_msg_en         = $request->key_msg_en;
            $item->key_msg_desc_en    = $request->key_msg_desc_en;
            $item->expo_yn            = $request->expo_yn;
            $item->url                = $request->url;
            $item->url_en             = $request->url_en;
            $item->link_text_ko       = $request->link_text_ko;
            $item->link_text_en       = $request->link_text_en;
            $item->data_1_ko          = $request->data_1_ko;
            $item->data_1_en          = $request->data_1_en;
            $item->desc_1_ko          = $request->desc_1_ko;
            $item->desc_1_en          = $request->desc_1_en;
            $item->data_2_ko          = $request->data_2_ko;
            $item->data_2_en          = $request->data_2_en;
            $item->desc_2_ko          = $request->desc_2_ko;
            $item->desc_2_en          = $request->desc_2_en;
            $item->created_id         = $this->getUserId();
            $item->updated_id         = $this->getUserId();
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

        return $this->handle_ok("키메세지가 등록되었습니다.", ['id'=>$item->id]);
    }

}
