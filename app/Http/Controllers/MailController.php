<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MailController extends Controller
{
    const __PKG__ = 'admin.common.';

    public function __construct()  
    {
    }

    //-----------------------------------------
    public function sendmail_proc(Request $request)
    {
        // NETPION.S_AUTOMAIL_INTERFACE( 'MTYPE'
        // , 'SCHP'	
        // , '수신자이메일(평문)'	
        // , '수신자명'	
        // , '발신자이메일(평문)'
        // , '발신자명'	
        // , '메일제목'	
        // , '메일내용' )	
        // 메일내용은 CLOB 타입입니다

        $user   = env('ORACLE_MAIL_USERNAME');
        $pwd    = env('ORACLE_MAIL_PASSWORD');
        $dsn    = env('ORACLE_MAIL_HOST').'/'.env('ORACLE_MAIL_SID');

        $v_from     = $request['from'];
        $v_to       = $request['to'];
        $v_from_nm  = $request['from_nm'];
        $v_to_nm    = $request['to_nm'];
        $v_subject  = $request['subject'];
        $v_content  = $request['content'];

        $v_from_nm  = iconv("utf-8", "euc-kr", $v_from_nm);
        $v_to_nm    = iconv("utf-8", "euc-kr", $v_to_nm);
        $v_subject  = iconv("utf-8", "euc-kr", $v_subject);
        $v_content  = iconv("utf-8", "euc-kr", $v_content);

        $conn = oci_connect($user, $pwd, $dsn, 'US7ASCII');
        if (!$conn)
        {
            $e = oci_error();
            return $this->handle_error('9999', $e);
        }

        //stored procedure
        $query ="begin NETPION.S_AUTOMAIL_INTERFACE( 'MTYPE'".
                        ",'SCHP' ".
                        ",:v_to ".
                        ",:v_to_nm ".
                        ",:v_from ".
                        ",:v_from_nm ".
                        ",:v_subject ".
                        ",:v_content );".
                " end;";

        $stmt = oci_parse($conn, $query);

        oci_bind_by_name($stmt, ":v_to"         , $v_to);
        oci_bind_by_name($stmt, ":v_to_nm"      , $v_to_nm);
        oci_bind_by_name($stmt, ":v_from"       , $v_from);
        oci_bind_by_name($stmt, ":v_from_nm"    , $v_from_nm);
        oci_bind_by_name($stmt, ":v_subject"    , $v_subject);
        oci_bind_by_name($stmt, ":v_content"    , $v_content);

        if (false == oci_execute($stmt))
        {
            $e = oci_error($stmt);
            return $this->handle_error('9998', $e);
        }
        
        oci_commit($conn);

        oci_free_statement($stmt);
        oci_close($conn);

        return $this->handle_ok('메일 전송을 완료했습니다.');
    }

    //-----------------------------------------
    public function sendmailOne(Request $request)
    {
        if (config('app.env') == 'production')
        {
            return $this->sendmail_real($request);
        }

        return $this->sendmail_emul($request);
    }

    //-----------------------------------------
    public function sendmailMulti(Request $request)
    {
        $r = $request->only(['to', 'to_nm']);
        $count = 0;
        if (isset($r['to']) && isset($r['to_nm']))
        {
            $to = explode(',', $r['to']);
            $to_nm = explode(',', $r['to_nm']);

            $size = sizeof($to);
            for ($i=0; $i<$size; $i++)
            {
                $request['to'] = $to[$i];
                $request['to_nm'] = $to_nm[$i];

                if (config('app.env') == 'production')
                {
                    $ret = $this->sendmail_real($request);
                    if ($ret == true)
                    {
                        $count++;
                    }

                    if ($size == $count)
                    {
                        return $this->handle_ok('메일 전송을 완료했습니다.');
                    }
                }
                else
                {
                    $ret = $this->sendmail_emul($request);
                    if ($ret == true)
                    {
                        $count++;
                    }

                    if ($size == $count)
                    {
                        return $this->handle_ok('메일 전송을 완료했습니다.');
                    }
                }
            }
        }

        return $this->handle_error('9999', '메일 전송 실패.');
    }    

    //-----------------------------------------
    public function sendmail(Request $request)
    {
        if (config('app.env') == 'production')
        {
            $ret = $this->sendmail_real($request);
            if ($ret == false)
            {
                return $this->handle_error('9999', '메일 전송 실패.');
            }

            return $this->handle_ok('메일 전송을 완료했습니다.');
        }

        return $this->sendmail_emul($request);
    }

    //-----------------------------------------
    public function sendmail_emul(Request $request)
    {
        $v_from     = $request['from'];
        $v_to       = $request['to'];
        $v_from_nm  = $request['from_nm'];
        $v_to_nm    = $request['to_nm'];
        $v_subject  = $request['subject'];
        $v_content  = $request['content'];

        // return $this->handle_ok('메일 전송을 완료했습니다.', ['content'=>$v_content]);
        Log::debug('<==========메일전송요청=============>');
        Log::debug('from => '.$v_from);
        Log::debug('to => '.$v_to);
        Log::debug('from_nm => '.$v_from_nm);
        Log::debug('to_nm => '.$v_to_nm);
        Log::debug('subject => '.$v_subject);
        Log::debug('content => '.$v_content);

        return true;
    }

    //-----------------------------------------
    public function sendmail_real(Request $request)
    {
        $user   = env('ORACLE_MAIL_USERNAME');
        $pwd    = env('ORACLE_MAIL_PASSWORD');
        $dsn    = env('ORACLE_MAIL_HOST').'/'.env('ORACLE_MAIL_SID');

        $v_from     = $request['from'];
        $v_to       = $request['to'];
        $v_from_nm  = $request['from_nm'];
        $v_to_nm    = $request['to_nm'];
        $v_subject  = $request['subject'];
        $content    = $request['content'];

        $v_from_nm  = iconv("utf-8", "euc-kr", $v_from_nm);
        $v_to_nm    = iconv("utf-8", "euc-kr", $v_to_nm);
        $v_subject  = iconv("utf-8", "euc-kr", $v_subject);

        $v_content  = iconv("utf-8", "euc-kr//IGNORE", $content);

        $conn = oci_connect($user, $pwd, $dsn, 'US7ASCII');
        if (!$conn)
        {
            // $e = oci_error();
            return false;
        }

        $query =
            "insert into NETPION.AUTOMAIL_INTERFACE(".
            "autocode,".
            "legacyid,".
            "autotype,".
            "email,".
            "name,".
            "insertdate,".
            "sendyn,".
            "fromaddress,".
            "fromname,".
            "title,".
            "content,".
            "tag1,".
            "tag2,".
            "tag3,".
            "tag4,".
            "tag5,".
            "tag6,".
            "tag7,".
            "tag8,".
            "tag9,".
            "tag10".
            ")values(".
            "NETPION.seq_automail.nextval,".
            "'SCHP',".
            "'001',".
            "XX1.ENC_VARCHAR2_INS('".$v_to."', 10, 'MAIL'),".
            "SUBSTR('".$v_to_nm."', 0, 100),".
            "SYSDATE,".
            "'N',".
            "XX1.ENC_VARCHAR2_INS('".$v_from."', 10, 'MAIL'),".
            "SUBSTR('".$v_from_nm."', 0, 100),".
            "SUBSTR('".$v_subject."', 0, 500),".
            ":v_content,".
            "'',".
            "'',".
            "'',".
            "'',".
            "'',".
            "'',".
            "'',".
            "'',".
            "'',".
            "''".
            ")";

        $stmt = oci_parse($conn, $query);

        oci_bind_by_name($stmt, ":v_content", $v_content);

        if (false == oci_execute($stmt))
        {
            // $e = oci_error($stmt);
            return false;
        }

        oci_commit($conn);

        oci_free_statement($stmt);
        oci_close($conn);

        return true;
    }

}
