<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Customer;
use App\Models\CustomReply;
use Illuminate\Http\Request;
use App\Models\CustomQuestion;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CustomerController;

class CustomReplyController extends Controller
{
    const __CLAZZ__ = 'customreply';

    protected $rules =
    [
        'id'         => 'required',
        'subject'    => 'required',
        'content'    => 'required'
    ];

    protected $clazz = self::__CLAZZ__;

    public function __construct()  
    {
        //[주의]
        //모델은 CustomReply로 되어 있지만, 결국 CustomQuestion
        //을 같이 처리해야 한다.
        //현재 객체에서 delete를 override해야 함.
        //목록은 CustomQuestionController에서 삭제를 하고,
        //답변이 있을 경우, 삭제도 해야 함.
        $this->setModel('App\Models\CustomReply');
    }

    //-------------------------------------------
    // 고객상담요청 초기 호출
    public function index(Request $request)
    {
        // $items_custsvc = DB::table('codes')->where(['codegroup_id' => 'custsvc'])->get();
        // return view('main.'.App::getLocale().'.footer.ft_01_02')->with([       
        //     'items_custsvc' => $items_custsvc
        // ]);

        parent::index($request);
    }

    //-------------------------------------------
    public function store(Request $request)
    {
        $id = $request->id;

        $validator = Validator::make($request->all(), $this->rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        try
        {
            $id = $request['id'];
            $item = CustomReply::find($id);
            if( !isset($item) )
            {
                $item = new CustomReply();
                $item->id = $id;
                $item->seq = 1;

                //새로 생성시 반드시 초기화.
                $item->attach_id = 0;
            }

            if (isset($id) && $id > 0)
            {
                //수정시 첨부파일은 변경하지 않을 경우 0으로 넘겨야 한다.
                if ($request->attach_id > 0)
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
                $item->attach_id = $request->attach_id;
            }

            $item->subject = $request->subject;
            $item->content = $request->content;
            $item->created_id = $this->getUserId();
            $item->updated_id = $this->getUserId();
            $item->save();

            //CustomQuestion 업데이트
            $cust_quest = CustomQuestion::find($id);
            if (isset($cust_quest))
            {
                $cust_quest->reply_flag = $request->reply_flag;
                $cust_quest->save();
            }

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

        return $this->handle_ok((($cust_quest->type=='01')?"고객상담":"제보")." 답변이 등록되었습니다.", ['id'=>$item->id]);
    }    

    //-------------------------------------------
    public function get($id)
    {
        if ( isset($id) )
        {
            $cust_reply = CustomReply::find($id);
            return $cust_reply;
        }

        return null;
    }

    //-------------------------------------------
    public function show(Request $request)
    {
        $id = $request['id'];
        if ( isset($id) )
        {
            $cust_reply = CustomReply::find($id);
            return $cust_reply;
        }

        return null;
    }

    //-------------------------------------------
    public function upload(Request $request)
    {
        $r = $request->input();

        $data = json_decode($r['data'], true);

        $rules = $this->rules;

        //불필요 체크시, 검증 제외 됨.
        if ($data['reply_flag'] == '05')
        {
            unset($rules['subject']);
            unset($rules['content']);
        }

        $validator = Validator::make($data, $rules);

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        $item = null;
        $attach_id = 0;

        try
        {
            $id = $data['id'];
            $item = CustomReply::find($id);
            if( !empty($item) )
            {
                $request['file_id'] = $item->attach_id;
                $attach_id = (new FileController)->update($request);
                if ($attach_id < 0)
                {
                    $message = (new FileController)->getErrMsg($attach_id, $request);
                    return $this->handle_error(self::err_insert_failure, $message);
                }

                if ($attach_id > 0)
                {
                    $item->attach_id = $attach_id;
                }

                $data['attach_id'] = $attach_id;

                if (!empty($this->getUserId()))
                {
                    $this->logger('[id='.$id.']답변변경');
                }
            }
            else
            {
                $item = new CustomReply();
                $item->id = $id;
                $item->seq = 1;

                $attach_id = (new FileController)->insert($request);
                if ($attach_id < 0)
                {
                    $message = (new FileController)->getErrMsg($attach_id, $request);
                    return $this->handle_error(self::err_insert_failure, $message);
                }

                $item->attach_id = $attach_id;
                $data['attach_id'] = $attach_id;

                if (!empty($this->getUserId()))
                {
                    $this->logger('[id='.$id.']답변등록');
                }
            }

            $item->fill($data);
            $item->created_id = $this->getUserId();
            $item->updated_id = $this->getUserId();
            $item->save();

            //CustomQuestion 업데이트
            $custquest = CustomQuestion::find($id);
            if (isset($custquest))
            {
                $custquest->reply_flag = $data['reply_flag'];
                $custquest->save();
            }            

            $this->commit();

            if ($custquest->reply_flag != '05' && $custquest->reply_yn == 'Y')
            {
                $request['type'] = $data['type'];
                $request['receipt_id'] = $id;
                $this->sendMailReply($request);
            }
        }
        catch(Exception $e)
        {
            $this->attachClear($attach_id);
            return $this->handle_error(self::err_insert_failure, $e->getMessage());
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok((($custquest->type=='01')?"고객상담":"제보")." 답변이 등록되었습니다.");
    }

    //-------------------------------------------
    public function delete(Request $request)
    {
        //항목 삭제
        $r = $request->input();

        $id = $r['id'];
        if ( !empty($id) )
        {
            $item = CustomReply::find($id);
            if( isset($item) )
            {
                //첨부파일이 존재하는 경우
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $result = (new FileController)->delete($item->attach_id);
                    if($result <= 0)
                    {
                        return $this->handle_error(self::err_delete_failure, '삭제되지 않았습니다.');
                    }
                }

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    //$this->logger_delete();
                    $this->logger('[id='.$id.']답변삭제');
                    return $this->handle_ok('삭제되었습니다.');
                }

                return $this->handle_error(self::err_delete_failure, '삭제되지 않았습니다.');
            }
            else
            {
                //이 경우는 답변이 없는 경우 임.
                //내용 확인 후, 처리가 필요 함.
            }
        }

        return $this->handle_ok('삭제할 답변 항목이 없습니다.');
    }

    //-------------------------------------------
    public function sendMailReply(Request $request)
    {
        $ret = false;
        $type = $request->type;
        $id = $request->receipt_id;
        $lang = $this->getLanguage();

        $custquest = CustomQuestion::find($id);
        if (isset($custquest))
        {
            $customer = (new CustomerController)->get($custquest->cust_id);
            if (isset($customer))
            {
                $content = view('admin.common.mail.email_reply')->with([
                    'lang' => $lang,
                    'type' => $type,
                    'receipt_id' => $id,
                    'url_result' => URL::to('search-inquiry?type='.$type),
                    'url_main' => URL::to('/')
                ])->render();

                if (isset($content))
                {
                    $to = $customer->email;
                    $to_nm = $customer->cust_nm;

                    if ( !empty($to) )
                    {
                        $request['from'] = env('ORACLE_MAIL_ADMIN');
                        $request['from_nm'] = ($lang=='ko')?"신세계건설":"SHINSEGAE E&C";

                        if ($type == '01')
                        {
                            $request['subject'] = ($lang=='ko')?
                            "문의하신 내용에 대한 답변이 완료되었습니다.":
                            "Your inquiry have been answered.";
                        }
                        else
                        {
                            $request['subject'] = ($lang=='ko')?
                            "제보하신 내용에 대한 답변이 완료되었습니다.":
                            "Your report have been answered.";
                        }

                        $request['content'] = $content;

                        $request['to'] = $to;
                        $request['to_nm'] = $to_nm;

                        //메일전송
                        $ret = (new MailController)->sendmailOne($request);
                    }
                }
            }
        }

        return $ret;
    }

    //-------------------------------------------
    public function downloadAttach(Request $request)
    {
        $id = $request->id;
        $file_nm = $request->file_nm;
        // $this->logger('[id='.$id.']'.$file_nm.' 조회');
        $this->logger('[id='.$id.']첨부파일조회');
    }
}
