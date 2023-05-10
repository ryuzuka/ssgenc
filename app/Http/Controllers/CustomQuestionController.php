<?php

namespace App\Http\Controllers;

use App\Models\CustomQuestion;
use App\Models\CustomReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Validator;

class CustomQuestionController extends Controller
{
    const __PKG__ = 'admin.board.';
    const __CLAZZ__ = 'custom';
    const __TABLE__ = 'customquestions';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    private $default_err_code;

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
        $this->default_err_code = $this->getDefaultErrCode(self::__CLAZZ__);
        $this->setModel('App\Models\CustomQuestion');
    }

    //-------------------------------------------
    function getMasking($text)
    {
        $length = mb_strlen($text, "utf-8");
        if ($length == 2)
        {
            return mb_substr($text, 0, 1).'*';
        }

        $andMarking = "";
        for($i = 2; $i < $length; $i++)
        {
            $andMarking .= "*";
        }
        $sMarking = mb_substr($text, 0, 1, 'utf-8');
        $eMarking = mb_substr($text, $length - 1, $length, 'utf-8');
        return $sMarking.$andMarking.$eMarking;
    }

    //-------------------------------------------
    public function getMenuUrl($type, $gubun)
    {
        $menu_url = null;

        if ($type == '02')
        {
            //제보
            //국문, 영문 페이지 때문에 url 키로 조회해야 한다.
            $menu_url = 'custom?type=02';
        }
        else
        {
            //고객상담.
            switch($gubun)
            {
              case '01': $menu_url = 'sales'; break;//분양/계약
              case '02': $menu_url = 'as'; break;//AS/하자
              case '03': $menu_url = 'order'; break;//수주상담
              case '04': $menu_url = 'partner'; break;//협력회사
              case '05': $menu_url = 'general'; break;//일반문의
              case '06': $menu_url = 'leisure'; break; //레저(골프장, 아쿠아필드)
            }
        }

        return $menu_url;
    }

    //-------------------------------------------
    public function getCategory($type, $gubun)
    {
        $name = null;

        if ($type == '01')
        {
            $item = DB::table('codes')->where(['codegroup_id'=>'custsvc', 'code_id'=>$gubun, 'view'=>'Y'])->first();
            if (isset($item))
            {
                $name = $item->code_nm;
            }
        }
        else
        {
            $item = DB::table('codes')->where(['codegroup_id'=>'tipoffs', 'code_id'=>$gubun, 'view'=>'Y'])->first();
            if (isset($item))
            {
                $name = $item->code_nm;
            }
        }

        return $name;
    }

    //-------------------------------------------
    // 고객상담요청 초기 호출
    public function index(Request $request)
    {
        $this->checkMenuAuth($request['type']);

        parent::index($request);

        return $this->getList($request);
    }

    //-------------------------------------------
    // 고객상담요청 초기 호출
  public function get($type)
  {
    $lang = $this->getLanguage();
    $token = Str::random(6); // Generate a random token
    session(['otp_token' => $token]);

    if ($type == '01') {
      //고객상담
      $items_custsvc = DB::table('codes')->where(['codegroup_id' => 'custsvc', 'view' => 'Y'])->get();
      return view('main.' . $lang . '.footer.ft_01_02')->with([
        'items_custsvc' => $items_custsvc,
        'token' => $token,
      ]);
    } else {
      //제보
      $items_tipoffs = DB::table('codes')->where(['codegroup_id' => 'tipoffs', 'view' => 'Y'])->get();
      return view('main.' . $lang . '.csr.cr_01_09_01')->with([
        'items_tipoffs' => $items_tipoffs,
        'token' => $token,
      ]);
    }
  }

    //-------------------------------------------
    // 고객상담요청 초기 호출
    public function searchInquery(Request $request)
    {
        $type = $request->type;

        return view('main.'.$this->getLanguage().'.csr.cr_01_08_01')->with([
            'type' => $type
        ]);
    }

    //-------------------------------------------
    //접수결과 알림 화면
    public function receipt(Request $request)
    {
        //고객 메일로 결과 전송하기.
        $cust_id = null;
        $type = $request->type;
        $id = $request->receipt_id;

        $html = view('main.'.App::getLocale().'.footer.ft_01_02_end')->with([
            'mail_form' => false,
            'type' => $type,
            'receipt_id' => $id,
            'url_result' => URL::to('search-inquiry?type='.$type),
            'url_main' => URL::to('/')
        ])->render();

        return $html;
    }

    //-------------------------------------------
    //접수결과 알림 화면
    public function checkReceipt_bak(Request $request)
    {
        $lang = $this->getLanguage();

        $customer = (new CustomerController)->show($request);
        if ( !isset($customer) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_info', [], $lang));
        }

        $sql = CustomQuestion::where([
            'type' => $request['type'],
            'cust_id' => $customer->cust_id,
            // 'password' => $request['password'],
            'lang' => $this->getLanguage()
        ]);

        $item = $sql->first();

        //상담 조회
        if ( !isset($item) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_quest', [], $lang));
        }

        return $this->handle_ok("접수된 고객이 존재합니다.");
    }

    //-------------------------------------------
    //접수결과 알림 화면
    public function checkReceipt(Request $request)
    {
        $lang = $this->getLanguage();

        $customers = (new CustomerController)->showMulti($request);
        if ( !isset($customers) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_info', [], $lang));
        }

        $customer_filter = array();
        foreach($customers as $it)
        {
            array_push($customer_filter, $it->cust_id);
        }

        $q = CustomQuestion::where([
            'type' => $request['type'],
            'lang' => $this->getLanguage()
        ])->whereIn('cust_id', $customer_filter);

        //상담 조회
        if ( $q->count() == 0 )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_quest', [], $lang));
        }

        return $this->handle_ok("접수된 고객이 존재합니다.");
    }

    //-------------------------------------------
    // 문의결과조회
    public function show_bak(Request $request)
    {
        //목록 화면 호출
        $gubun = null;

        $files_q = null;
        $file_token_q = null;

        $files_r = null;
        $file_token_r = null;

        $lang = $this->getLanguage();
        $type = $request->type;

        $customer = (new CustomerController)->show($request);
        if ( !isset($customer) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_info', [], $lang));
        }

        $item_quest = CustomQuestion::where([
            'type' => $type,
            'cust_id' => $customer->cust_id,
            'lang' => $this->getLanguage()
        ])->first();

        //상담 조회
        if ( !isset($item_quest) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_quest', [], $lang));
        }

        $code_id = $item_quest->gubun;
        if ($item_quest->type == '01')
        {
            //고객상담
            $gubun = DB::table('codes')->where([
                'codegroup_id' => 'custsvc',
                'code_id' => $code_id
            ])->first();

            //첨부파일 처리
            if($item_quest->attach_id > 0)
            {
                //다운로드 첨부파일 정보 읽기.
                $arrfiles = (new FileController)->show($item_quest->attach_id);
                if (isset($arrfiles))
                {
                    $file_token_q = $arrfiles['file_token'];
                    $files_q = $arrfiles['files'];
                }
            }
        }
        else
        {
            //제보
            $gubun = DB::table('codes')->where([
                'codegroup_id' => 'tipoffs',
                'code_id' => $code_id
            ])->first();

            //첨부파일 처리
            if($item_quest->attach_id > 0)
            {
                //다운로드 첨부파일 정보 읽기.
                $arrfiles = (new FileController)->show($item_quest->attach_id);
                if (isset($arrfiles))
                {
                    $file_token_q = $arrfiles['file_token'];
                    $files_q = $arrfiles['files'];
                }
            }
        }

        $item_quest->content = preg_replace('/\r\n|\r|\n/', '<br>', $item_quest->content);

        $item_reply = (new CustomReplyController)->get($item_quest->id);
        if (isset($item_reply))
        {
            //첨부파일 처리
            if($item_reply->attach_id > 0)
            {
                //다운로드 첨부파일 정보 읽기.
                $arrfiles = (new FileController)->show($item_reply->attach_id);
                if (isset($arrfiles))
                {
                    $file_token_r = $arrfiles['file_token'];
                    $files_r = $arrfiles['files'];
                }
            }

            $item_reply->content = preg_replace('/\r\n|\r|\n/', '<br>', $item_reply->content);
        }

        //고객명 이름 마스킹 처리
        if ($lang == 'ko')
        {
            if (isset($customer))
            {
                $customer->cust_nm = $this->getMasking($customer->cust_nm);
            }
        }

        // search-result
        return view('main.'.$lang.'.csr.cr_01_08_03')->with([
            'type' => $type,
            'gubun' => $gubun,
            'customer' => $customer,
            'item_quest' => $item_quest,
            'item_reply' => $item_reply,
            'file_token_q' => $file_token_q,
            'files_q' => $files_q,
            'file_token_r' => $file_token_r,
            'files_r' => $files_r
        ]);
    }

    //-------------------------------------------
    // 문의결과조회
    public function show(Request $request)
    {
        //목록 화면 호출
        $gubun = null;
        $lang = $this->getLanguage();
        $type = $request->type;

        $customers = (new CustomerController)->showMulti($request);
        if ( !isset($customers) )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_info', [], $lang));
        }

        $customer_filter = array();
        foreach($customers as $it)
        {
            //고객명 이름 마스킹 처리
            $it->cust_nm = $this->getMasking($it->cust_nm);
            array_push($customer_filter, $it->cust_id);
        }

        $q = CustomQuestion::where([
            'type' => $type,
            'lang' => $this->getLanguage()
        ])->whereIn('cust_id', $customer_filter)->orderBy('created_at', 'desc');

        //상담 조회
        if ( $q->count() == 0 )
        {
            return $this->handle_error($this->default_err_code, __('auth.no_cust_quest', [], $lang));
        }

        $items = $q->get();

        $codegroup_id = ($type == '01')? 'custsvc' : 'tipoffs';

        $i = 0;
        foreach($items as $item)
        {
            $gubun = DB::table('codes')->where([
                'codegroup_id' => $codegroup_id,
                'code_id' => $item->gubun
            ])->first();

            if (isset($gubun))
            {
                if ($lang == 'ko')
                {
                    $item->gubun = $gubun->code_nm;
                }
                else
                {
                    $item->gubun = $gubun->code_nm_en;
                }
            }

            //문의/제보 첨부파일 처리
            if($item->attach_id > 0)
            {
                //다운로드 첨부파일 정보 읽기.
                $files = (new FileController)->downloadList($item->attach_id);
                if (isset($files))
                {
                    $item->{"files"} = $files;
                }
            }

            $item->{"cust_nm"} = $customers[$i++]->cust_nm;
            $item->content = preg_replace('/\r\n|\r|\n/', '<br>', $item->content);

            //답변조회
            $reply = (new CustomReplyController)->get($item->id);
            if (isset($reply))
            {
                //첨부파일 처리
                if($reply->attach_id > 0)
                {
                    //다운로드 첨부파일 정보 읽기.
                    $files = (new FileController)->downloadList($reply->attach_id);
                    if (isset($files))
                    {
                        $reply->{"files"} = $files;
                    }
                }

                $reply->content = preg_replace('/\r\n|\r|\n/', '<br>', $reply->content);

                $item->{"reply"} = $reply;
            }
        }

        // search-result
        return view('main.'.$lang.'.csr.cr_01_08_03')->with([
            'type' => $type,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    // 고객상담요청 등록
    public function store(Request $request)
    {
        $validator = null;
        $rules = null;
        $cust_id = 0;

        $id = $request->id;

        if ($request['type'] == '01' && $request->gubun == '03')
        {
            $rules = [
                'cust_nm'       => 'required',
                'email'         => 'required',
                'reply_yn'      => 'required',
                'type'          => 'required',
                'gubun'         => 'required',
                'subject'       => 'required',
                'content'       => 'required',
                'address'       => 'required',
                'password'      => 'required'
            ];
        }
        else
        {
            $rules = [
                'cust_nm'       => 'required',
                'email'         => 'required',
                'reply_yn'      => 'required',
                'type'          => 'required',
                'gubun'         => 'required',
                'subject'       => 'required',
                'content'       => 'required',
                'password'      => 'required'
            ];

            if ($request['type'] == '02')
            {
                $rules['name_yn'] = 'required';
            }
        }

        $lang = $this->getLanguage();

        $customMessages = [
            'required' => ($lang=='ko')? ':attribute 항목은 필수 입니다.' : 'The :attribute field is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages)
            ->setAttributeNames(
                [
                    'cust_nm'   => ($lang=='ko')? '"이름"'              : '"name"',
                    'reply_yn'  => ($lang=='ko')? '"답변회신여부"'      : '"reply check"',
                    'email'     => ($lang=='ko')? '"이메일"'            : '"email"',
                    'subject'   => ($lang=='ko')? '"제목"'              : '"subject"',
                    'content'   => ($lang=='ko')? '"내용"'              : '"content"',
                    'password'  => ($lang=='ko')? '"비밀번호"'          : '"password"',
                    'address'   => ($lang=='ko')? '"공사위치(주소)"'    : '"construction location(address)"',
                ],
            );

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        try
        {
            if (isset($id) && $id > 0)
            {
                $custquest = CustomQuestion::find($id);
                if (isset($custquest))
                {
                    $cust_id = $custquest->cust_id;
                }
            }
            else
            {
                $custquest = new CustomQuestion();
                $cust_id = (new CustomerController)->store($request);
                if ($cust_id == 0)
                {
                    $msg = ($lang=='ko')? "고객정보 등록 실패." : "customer's information creation failure.";
                    return $this->handle_error(self::err_insert_failure, $msg);
                }
            }

            $custquest->cust_id     = $cust_id;
            $custquest->type        = $request->type;
            $custquest->gubun       = $request->gubun;
            $custquest->subject     = $request->subject;
            $custquest->content     = $request->content;

            if ($request['type'] == '01' && $request->gubun == '03')
            {
                $custquest->address     = $request->address;
                $custquest->gu          = $request->gu;
                $custquest->gfa         = $request->gfa;
                $custquest->land_area   = $request->land_area;
                $custquest->usage       = $request->usage;
                $custquest->floors_no   = $request->floors_no;
                $custquest->basement_no = $request->basement_no;
                $custquest->contract_amt= $request->contract_amt;
                $custquest->household = $request->household;
            }
            else
            {
                $custquest->address     = "";
                $custquest->gu          = "";
                $custquest->gfa         = "";
                $custquest->land_area   = "";
                $custquest->usage       = "";
                $custquest->floors_no   = 0;
                $custquest->basement_no = 0;
                $custquest->contract_amt= 0;
                $custquest->household = 0;
            }

            $custquest->lang        = $this->getLanguage();
            $custquest->password    = $request->password;
            $custquest->reply_yn    = $request->reply_yn;
            $custquest->name_yn     = (isset($request->name_yn))?$request->name_yn:"";
            $custquest->reply_flag  = $request->reply_flag;

            if ( isset($request['type']) && $request['type'] == '02' && $request->privacy_policy_yn=='Y' )
            {
                $custquest->accuser_nm = (isset($request->accuser_nm))?$request->accuser_nm:"";
                $custquest->part_nm    = (isset($request->part_nm))?$request->part_nm:"";
            }
            else
            {
                $custquest->accuser_nm = "";
                $custquest->part_nm    = "";
            }

            if( isset($request['attach_id']) )
            {
                $custquest->attach_id = $request->attach_id;
            }
            else
            {
                $custquest->attach_id = 0;
            }

            $custquest->created_id = $this->getUserId();
            $custquest->updated_id = $this->getUserId();

            $custquest->save();

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

        return $this->handle_ok(
            ($lang=='ko')?
            "요청 정보가 등록되었습니다.":
            "The registration has been completed.", ['receipt_id' => $custquest->id]);
    }

    //-------------------------------------------
    public function sendMailRegist(Request $request)
    {
        $ret = false;
        $type = $request->type;
        $gubun = $request->gubun;
        $id = $request->receipt_id;
        $lang = $this->getLanguage();

        $custquest = CustomQuestion::find($id);
        if (isset($custquest))
        {
            $customer = (new CustomerController)->get($custquest->cust_id);
            if (isset($customer))
            {
                //고객, 담당자 구분값이 필요 함(수정필요).
                $content = view('admin.common.mail.email_regist')->with([
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

                        if ($type=='01')
                        {
                            $request['subject'] = ($lang=='ko')?"문의하신 내용이 접수되었습니다.":"Your inquiry is submitted.";
                        }
                        else
                        {
                            $request['subject'] = ($lang=='ko')?"제보하신 내용이 접수되었습니다.":"Your report is submitted.";
                        }

                        $request['content'] = $content;
                        $request['to'] = $to;
                        $request['to_nm'] = $to_nm;

                        //고객 메일전송
                        $ret = (new MailController)->sendmailOne($request);
                    }
                }

                $content = view('admin.common.mail.email_regist_charge')->with([
                    'lang' => $lang,
                    'type' => $type,
                    'category' => $this->getCategory($type, $gubun),
                    'receipt_id' => $id,
                    'url_result' => config('app.url_admin').'/custom?type='.$type
                ])->render();

                if (isset($content))
                {
                    //고객상담, 제보 권한을 가진 담당자 중 메일 수신이 체크된 사용자에게 모두 전송.
                    $users = null;
                    $to = '';
                    $to_nm = '';

                    $menu_url = $this->getMenuUrl($type, $gubun);
                    $users = (new AccessController)->getMenuAccessUser($menu_url);
                    if (isset($users))
                    {
                        foreach($users as $user)
                        {
                            $to     .= $user->email.',';
                            $to_nm  .= $user->name.',';
                        }

                        $to = substr($to, 0, -1);
                        $to_nm = substr($to_nm, 0, -1);
                    }

                    //담당자 메일전송
                    if ( !empty($to) )
                    {
                        $request['from'] = env('ORACLE_MAIL_ADMIN');
                        $request['from_nm'] = ($lang=='ko')?"신세계건설":"SHINSEGAE E&C";

                        if ($type=='01')
                        {
                            $request['subject'] = ($lang=='ko')?"1:1 문의가 접수되었습니다.":"1:1 inquiry is submitted.";
                        }
                        else
                        {
                            $request['subject'] = ($lang=='ko')?"제보내용이 접수되었습니다.":"A report is submitted.";
                        }

                        $request['content'] = $content;
                        $request['to'] = $to;
                        $request['to_nm'] = $to_nm;

                        return (new MailController)->sendmailMulti($request);
                    }
                    else
                    {
                        return $this->handle_ok('메일 전송을 완료했습니다.');
                    }
                }
            }
        }

        return $this->handle_error('9999', '메일 전송 실패.');
    }

    //-------------------------------------------
    public function sendMailChange(Request $request)
    {
        $prev_type = $request->prev_type;
        $type = $request->type;
        $gubun = $request->gubun;
        $id = $request->receipt_id;
        $lang = $this->getLanguage();
        $subject = null;

        $custquest = CustomQuestion::find($id);
        if (isset($custquest))
        {
            // 응답이 불필요이면 메일 전송 하지 않음.
            if ($custquest->reply_flag != '05' && $custquest->reply_yn == 'Y')
            {
                //구분만 바뀔 경우, 고객에겐 메일 보내지 않음.
                //유형 변경 체크를 여기서 해야 함.
                //타입을 저장한 후, 호출하기 때문에 디비와 비교하면 안된다.
                if ($type != $prev_type)
                {
                    $customer = (new CustomerController)->get($custquest->cust_id);
                    if (isset($customer))
                    {
                        $content = view('admin.common.mail.email_change')->with([
                            'lang' => $lang,
                            'type' => $type,
                            'category' => $this->getCategory($type, $gubun),
                            'receipt_id' => $id,
                            'url_result' => URL::to('search-inquiry?type='.$type),
                            'url_main' => URL::to('/')
                        ])->render();

                        if (isset($content))
                        {
                            $to = $customer->email;
                            $to_nm = $customer->cust_nm;

                            if ($type=='02')
                            {
                                $subject = ($lang=='ko')?
                                    "제보하신 내용이 접수되었습니다.":
                                    "Your report is submitted.";
                                }
                            else
                            {
                                $subject = ($lang=='ko')?
                                    "1:1 문의가 접수되었습니다.":
                                    "1:1 inquiry is submitted.";
                            }

                            $request['from'] = env('ORACLE_MAIL_ADMIN');
                            $request['from_nm'] = ($lang=='ko')?"신세계건설":"SHINSEGAE E&C";
                            $request['subject'] = $subject;
                            $request['content'] = $content;

                            $request['to'] = $to;
                            $request['to_nm'] = $to_nm;

                            //메일전송
                            (new MailController)->sendmailMulti($request);
                        }
                    }
                }
            }

            $content = view('admin.common.mail.email_regist_charge')->with([
                'lang' => $lang,
                'type' => $type,
                'category' => $this->getCategory($type, $gubun),
                'receipt_id' => $id,
                'url_result' => config('app.url_admin').'/custom?type='.$type
            ])->render();

            if (isset($content))
            {
                //고객상담, 제보 권한을 가진 담당자 중 메일 수신이 체크된 사용자에게 모두 전송.
                $users = null;
                $to = '';
                $to_nm = '';

                $menu_url = $this->getMenuUrl($type, $gubun);
                $users = (new AccessController)->getMenuAccessUser($menu_url);
                if (isset($users))
                {
                    foreach($users as $user)
                    {
                        $to     .= $user->email.',';
                        $to_nm  .= $user->name.',';
                    }

                    $to = substr($to, 0, -1);
                    $to_nm = substr($to_nm, 0, -1);
                }

                //담당자 메일전송
                if ( !empty($to) )
                {
                    $request['from'] = env('ORACLE_MAIL_ADMIN');
                    $request['from_nm'] = ($lang=='ko')?"신세계건설":"SHINSEGAE E&C";

                    if ($type=='01')
                    {
                        $request['subject'] = ($lang=='ko')?"1:1 문의가 접수되었습니다.":"1:1 inquiry is submitted.";
                    }
                    else
                    {
                        $request['subject'] = ($lang=='ko')?"제보내용이 접수되었습니다.":"A report is submitted.";
                    }

                    $request['content'] = $content;
                    $request['to'] = $to;
                    $request['to_nm'] = $to_nm;

                    return (new MailController)->sendmailMulti($request);
                }
                else
                {
                    return $this->handle_ok('메일 전송을 완료했습니다.');
                }
            }
            else
            {
                return $this->handle_ok('메일 전송을 완료했습니다.');
            }
        }

        return $this->handle_error('9999', '메일 전송 실패.');
    }

    //-------------------------------------------
    // 컬럼 유형 또는 구분 변경 처리
    // TODO 변경시 담당자에게 메일 보내기.
    public function update(Request $request)
    {
        $r = $request->input();
        $id = $r['id'];
        $type = $r['type'];
        $gubun = $r['gubun'];
        // $reply_flag = $r['reply_flag'];

        $this->beginTransaction();

        try
        {
            if ( isset($id) )
            {
              $item = CustomQuestion::find($id);
              if (isset($item)) {
                if ($item->type !== $type) {
                  $logText = '게시글 이동(' . CustomQuestion::getTypeName($item->type) . '->' . CustomQuestion::getTypeName($type) . ')';
                  $this->logger($logText, $r['id']);
                }
                $item->type = $type;

                if ($item->gubun !== $gubun) {
                  $logText = '게시글 구분 수정(' . $this->getCategory($type, $item->gubun) . '->' . $this->getCategory($type, $gubun) . ')';
                  $this->logger($logText, $r['id']);
                }
                $item->gubun = $gubun;
                // $item->reply_flag    = $reply_flag;
                $item->save();

                $customer = (new CustomerController)->get($item->cust_id);
                if (isset($customer)) {
                  $customer->type = $type;
                  $customer->save();
                }
              }
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

        return $this->handle_ok("변경 되었습니다.");
    }

    //-------------------------------------------
    //고객상담 메뉴중 권한이 있는 코드만 조회한다.
    public function getAuthMenus($items_gubun)
    {
        if (isset($items_gubun))
        {
            $menus = (new MenuController)->getAccessMenuItems('고객상담 관리');
            // dd($menus);

            foreach($items_gubun as $item)
            {
                foreach($menus as $menu)
                {
                    if($menu->menu_nm == $item->code_nm)
                    {
                        $item->useflag = ($menu->access_yn=='Y')? 'Y' : 'N';
                    }
                }
            }

            $items_auth_gubun = $items_gubun->filter(function($item){
                if ($item->useflag=='Y' && $item->view=='Y')
                {
                    return $item;
                }
            });

            return $items_auth_gubun;
        }

        return null;
    }

    //-------------------------------------------
    public function getList(Request $request)
    {
        $r = $request->input();

        $items      = null;
        $from       = $this->checkFrom($r);
        $to         = $this->checkTo($r);
        $type       = $this->checkDefault($r, 'type', '01');
        $gubun      = $this->checkDefault($r, 'gubun', '01');
        $searchText = $this->checkDefault($r, 'searchText', null);

        $where = array();
        $code_filter = null;
        $where['type'] = $type;

        if (isset($r['gubun']) && $r['gubun'] != '00')
        {
            $where['gubun'] = $gubun;
        }

        $items_gubun_find = null;
        $items_gubun = null;

        if (isset($type) && $type=='01')
        {
            //TODO 메뉴권한설정에 따라 코드를 필터링해야 함.
            $menu = null;
            $items_auth_gubun = null;
            $items_gubun_find = DB::table('codes')->where('codegroup_id', 'custsvc')->get();
            $items_gubun = DB::table('codes')->where(['codegroup_id'=>'custsvc', 'view'=>'Y'])->get();
            $items_gubun_filter = $this->getAuthMenus($items_gubun);

            //$code_filter 에 코드를 넣고, where in 쿼리 조건을 만들어야 한다.
            if (isset($items_gubun_filter))
            {
                $code_filter = array();
                foreach($items_gubun_filter as $it)
                {
                    array_push($code_filter, $it->code_id);
                }
            }

            $items_gubun_01 = $items_gubun;
            $items_gubun_02 = DB::table('codes')->where(['codegroup_id'=>'tipoffs', 'view'=>'Y'])->get();
        }
        else
        {
            $items_gubun_find = DB::table('codes')->where('codegroup_id', 'tipoffs')->get();
            $items_gubun = DB::table('codes')->where(['codegroup_id'=>'tipoffs', 'view'=>'Y'])->get();
            $items_gubun_01 = DB::table('codes')->where(['codegroup_id'=>'custsvc', 'view'=>'Y'])->get();
            // $items_gubun_01 = $this->getAuthMenus($items_gubun_01);
            $items_gubun_02 = $items_gubun;
        }

        $query = '(SELECT code_nm FROM codes WHERE codegroup_id = "reply_flag" AND code_id=reply_flag) AS reply_flag';

        $q = DB::table($this->table)
            ->select(
                'id',
                'type',
                'gubun',
                'subject',
                DB::raw($query),
                'name_yn',
                'created_at'
            );

        if (count($where) > 0)
        {
            $q = $q->where($where);
        }

        $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
        $to = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        $q = $q->whereBetween('created_at', [$from, $to]);

        if (isset($searchText))
        {
            //우선 제목만
            $q = $q->where('subject','LIKE','%'.$searchText.'%');
        }

        //TODO 고객상담일 경우, 구분권한설정에 따라 목록을 필터링해야 함.
        //구분 권한이 없는 경우 목록에 표시되지 않아야 한다.
        if ($type == '01')
        {
            if (count($code_filter) > 0)
            {
                $q = $q->whereIn('gubun', $code_filter);
            }
        }

        $items = $q
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PAGE_LIMIT)
                    ->appends(request()->except('page')); //page만 제외하고, 나머지 파라메터를 붙임.

        if ($type == '02')
        {
            foreach($items as $item)
            {
                $item->name_yn = ($item->name_yn=='Y')? '실명' : '익명';
            }
        }

        $item_count = DB::table($this->table)->where('type', $type)->count();
        $items_type = DB::table('codes')->where('codegroup_id', 'custsvc_typ')->get();

        return view($this->list_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_type' => $items_type,
            'items_gubun_find' => $items_gubun_find,
            'items_gubun' => $items_gubun,
            'items_gubun_01' => $items_gubun_01,
            'items_gubun_02' => $items_gubun_02,
            'item_count' => $item_count,
            'items' => $items
        ]);
    }

    //-------------------------------------------
    public function getDetail(Request $request)
    {
        $r = $request->input();

        $q = null;
        $customer = null;
        $item_quest = null;
        $item_reply = null;

        $file_quest_count = 0;
        $file_reply_count = 0;
        $files_reply = null;

        $where = array();
        if ( isset($r['id']) )
        {
            $where['id'] = $r['id'];

            $item_quest = CustomQuestion::where($where)->first();
            if ( isset($item_quest) )
            {
                $customer = (new CustomerController)->get($item_quest->cust_id);
                if (isset($item_quest->attach_id) && $item_quest->attach_id>0)
                {
                    $files = (new FileController)->downloadList($item_quest->attach_id);
                    if (isset($files))
                    {
                        foreach($files as $f)
                        {
                            $item_quest->{"file_attach".$f['file_seq']} = $f['file_path'];
                            $item_quest->{"file_nm".$f['file_seq']} = $f['file_nm'];
                            $file_quest_count++;
                        }
                    }
                }

                $item_quest->content = preg_replace('/\r\n|\r|\n/', '<br>', $item_quest->content);
            }

            $item_reply = CustomReply::where($where)->first();
            if ( isset($item_reply) )
            {
                if (isset($item_reply->attach_id) && $item_reply->attach_id>0)
                {
                    $files_reply = (new FileController)->downloadList($item_reply->attach_id);
                }
            }
        }

        $type = $r['type'];
        $items_gubun = null;
        $items_reply_flag = null;
        $gubun = null;
        if (isset($type) && $type=='01')
        {
            $items_gubun = DB::table('codes')->where('codegroup_id', 'custsvc')->get();
            $gubun = DB::table('codes')->where(['codegroup_id' => 'custsvc', 'code_id'=>$item_quest->gubun])->first();
        }
        else
        {
            $items_gubun = DB::table('codes')->where('codegroup_id', 'tipoffs')->get();
            $gubun = DB::table('codes')->where(['codegroup_id' => 'tipoffs', 'code_id'=>$item_quest->gubun])->first();
        }

        $items_reply_flag = DB::table('codes')->where('codegroup_id', 'reply_flag')->get();
        if (isset($items_reply_flag))
        {
            foreach($items_reply_flag as $item)
            {
                //답변완료, 불필요만 사용 함.
                if ($item->code_id=='01' || $item->code_id=='05')
                {
                    $item->view = 'Y';
                }
                else
                {
                    $item->view = 'N';
                }
            }
        }

        $this->logger('상세조회', $r['id']);
        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'type'          => $type,
            'gubun_text'    => (isset($gubun))?$gubun->code_nm:'',
            'items_gubun'   => $items_gubun,
            'items_reply_flag' => $items_reply_flag,
            'customer'      => $customer,
            'item_quest'    => $item_quest,
            'item_reply'    => $item_reply,
            'file_quest_count'  => $file_quest_count,
            'file_reply_count'  => $file_reply_count,
            'files_reply' => $files_reply
        ]);
    }

    //-------------------------------------------
    //삭제시 답변도 같이 지워야하므로 오버라이딩한다.
    public function deleteRow($id)
    {
        if ( !empty($id) )
        {
            $item = $this->model::find($id);
            if( isset($item) )
            {
                //첨부파일이 존재하는 경우
                if ( isset($item->attach_id) && $item->attach_id > 0 )
                {
                    $result = (new FileController)->delete($item->attach_id);
                }

                //고객정보 삭제
                if (isset($item->cust_id) && $item->cust_id > 0)
                {
                    (new CustomerController)->get($item->cust_id)->delete();
                }

                //삭제된 레코드 개수가 리턴된다.
                $result = $item->delete();
                if ($result > 0)
                {
                    //답변이 있을 경우, 같이 삭제해야 함.
                    $result = (new CustomReplyController)->deleteRow($id);
                    $this->logger('[id='.$id.']삭제');
                    return true;
                }

                return false;
            }
        }

        return false;
    }

    //-------------------------------------------
    public function upload(Request $request)
    {
        $insert_flag = false;
        $validator = null;
        $rules = null;
        $cust_id = 0;
        $attach_id = 0;

        $r = $request->input();
        $data = json_decode($r['data'], true);


      $token = session('otp_token');
      if ($data['otp'] !== $token) {
        $lang = $this->getLanguage();
        $message = ($lang == 'ko') ? '토큰 값이 유효하지 않습니다.' : 'Token value is not valid.';
        return $this->handle_error('9999', $message);
      }
      session()->forget('otp_token');


        $id = $data['id'];
        $type = $data['type'];
        $gubun = $data['gubun'];

        if ($type == '01' && $gubun == '03')
        {
            $rules = [
                'cust_nm'       => 'required',
                'email'         => 'required',
                'reply_yn'      => 'required',
                'type'          => 'required',
                'gubun'         => 'required',
                'subject'       => 'required',
                'content'       => 'required',
                'address'       => 'required',
                'password'      => 'required'
            ];
        }
        else
        {
            $rules = [
                'cust_nm'       => 'required',
                'email'         => 'required',
                'reply_yn'      => 'required',
                'type'          => 'required',
                'gubun'         => 'required',
                'subject'       => 'required',
                'content'       => 'required',
                'password'      => 'required'
            ];

            if ($type == '02')
            {
                $rules['name_yn'] = 'required';
            }
        }

        $lang = $data['lang'];

        $customMessages = [
            'required' => ($lang=='ko')? ':attribute 항목은 필수 입니다.' : 'The :attribute field is required.'
        ];

        $validator = Validator::make($data, $rules, $customMessages)
            ->setAttributeNames(
                [
                    'cust_nm'   => ($lang=='ko')? '"이름"'              : '"name"',
                    'reply_yn'  => ($lang=='ko')? '"답변회신여부"'      : '"reply check"',
                    'email'     => ($lang=='ko')? '"이메일"'            : '"email"',
                    'subject'   => ($lang=='ko')? '"제목"'              : '"subject"',
                    'content'   => ($lang=='ko')? '"내용"'              : '"content"',
                    'password'  => ($lang=='ko')? '"비밀번호"'          : '"password"',
                    'address'   => ($lang=='ko')? '"공사위치(주소)"'    : '"construction location(address)"',
                ],
            );

        if ( $validator->fails() )
        {
            return $this->handle_error(self::err_insert_invalid, "필수입력값 오류", $validator->errors()->all());
        }

        $this->beginTransaction();

        try
        {
            if ( !empty($id) )
            {
                $custquest = CustomQuestion::find($id);
                if (isset($custquest))
                {
                    $cust_id = $custquest->cust_id;

                    if ( isset($custquest->attach_id) )
                    {
                        $request['file_id'] = $custquest->attach_id;
                        $attach_id = (new FileController)->update($request);
                        if ($attach_id < 0)
                        {
                            $message = (new FileController)->getErrMsg($attach_id, $request);
                            return $this->handle_error(self::err_insert_failure, $message);
                        }

                        if ($attach_id > 0)
                        {
                            $custquest->attach_id = $attach_id;
                        }
                        $data['attach_id'] = $attach_id;
                    }

                    if (isset($data['updated_id']) || Schema::hasColumn($this->table, 'updated_id'))
                    {
                        $data['updated_id'] = $this->getUserId();
                    }
                }

                if (!empty($this->getUserId()))
                {
                    $this->logger('[id='.$custquest->id.',cust_id='.$cust_id.']변경');
                }
            }
            else
            {
                $custquest = new CustomQuestion();
                $cust_id = (new CustomerController)->upload($request);
                if ($cust_id == 0)
                {
                    $msg = ($lang=='ko')? "고객정보 등록 실패." : "customer's information creation failure.";
                    return $this->handle_error(self::err_insert_failure, $msg);
                }

                $data['cust_id'] = $cust_id;

                if (isset($data['attach_id']) || Schema::hasColumn($this->table, 'attach_id'))
                {
                    $attach_id = (new FileController)->insert($request);
                    if ($attach_id < 0)
                    {
                        $message = (new FileController)->getErrMsg($attach_id, $request);
                        return $this->handle_error(self::err_insert_failure, $message);
                    }

                    $custquest->attach_id = $attach_id;
                    $data['attach_id'] = $attach_id;
                }

                if (isset($data['created_id']) || Schema::hasColumn($this->table, 'created_id'))
                {
                    $data['created_id'] = $this->getUserId();
                }

                if (isset($data['updated_id']) || Schema::hasColumn($this->table, 'updated_id'))
                {
                    $data['updated_id'] = $this->getUserId();
                }

                $insert_flag = true;
            }

            if ( !($type == '01' && $gubun == '03') )
            {
                //고객상담의 수주상담이 아닐 경우
                $data['address']        = "";
                $data['gu']             = "";
                $data['gfa']            = "";
                $data['land_area']      = "";
                $data['usage']          = "";
                $data['floors_no']      = 0;
                $data['basement_no']    = 0;
                $data['contract_amt']   = 0;
                $data['household']      = 0;
            }
            else
            {
                //값을 입력하지 않았어도 등록이 되어야 한다.
                $data['address']        = (empty($data['address']))? "" : $data['address'];
                $data['gu']             = (empty($data['gu']))? "" : $data['gu'];
                $data['gfa']            = (empty($data['gfa']))? "" : $data['gfa'];
                $data['land_area']      = (empty($data['land_area']))? "" : $data['land_area'];
                $data['usage']          = (empty($data['usage']))? "" : $data['usage'];
                $data['floors_no']      = (empty($data['floors_no']))? 0 : $data['floors_no'];
                $data['basement_no']    = (empty($data['basement_no']))? 0 : $data['basement_no'];
                $data['contract_amt']   = (empty($data['contract_amt']))? 0 : $data['contract_amt'];
                $data['household']      = (empty($data['household']))? 0 : $data['household'];
            }

            $data['name_yn'] = (isset($data['name_yn']))?$data['name_yn']:"";
            if ( isset($type) && $type == '02' && $data['privacy_policy_yn']=='Y' )
            {
                $data['accuser_nm'] = (isset($data['accuser_nm']))?$data['accuser_nm']:"";
                $data['part_nm']    = (isset($data['part_nm']))?$data['part_nm']:"";
            }
            else
            {
                $data['accuser_nm'] = "";
                $data['part_nm']    = "";
            }

            $custquest->fill($data);
            $custquest->save();

            if ( $insert_flag )
            {
                //고객이 등록하는 경우, 문제가 된다.
                if (!empty($this->getUserId()))
                {
                    $this->logger('[id='.$custquest->id.',cust_id='.$cust_id.']등록');
                }
            }

            $this->commit();
        }
        catch(Exception $e)
        {
            $this->attachClear($attach_id);
            return $this->handle_error(self::err_insert_failure, ($lang=='ko')?'등록되지 않았습니다.':'The registration has been failed.');
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok(
            ($lang=='ko')?
            "요청 정보가 등록되었습니다.":
            'The registration has been completed.', ['receipt_id' => $custquest->id]);
    }
}
