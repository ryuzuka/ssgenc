<?php

namespace App\Models;

use App\Http\Controllers\MailController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory, EncryptedAttribute;
    protected $primaryKey = 'cust_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cust_nm',
        'mobile',
        'phone',
        'email',
        'email_hash',
        'adult_yn',
        'privacy_info_yn',
        'privacy_policy_yn',
        'company_cd',
        'password',
        'type'
    ];

    /**
     * The attributes that should be encrypted on save.
     *
     * @var array
     */
    protected $encryptable = [
        'cust_nm', 'mobile', 'email'
    ];

    //------------------------------------------------
    public function setCustNm($value)
    {
        $this->attributes['cust_nm'] = Crypt::encryptString($value);
    }

    //------------------------------------------------
    public function getCustNm($value)
    {
        try
        {
            return Crypt::decryptString($value);
        }
        catch (Exception $e)
        {
            return $value;
        }
    }

    //------------------------------------------------
    public function setMobile($value)
    {
        $this->attributes['mobile'] = Crypt::encryptString($value);
    }

    //------------------------------------------------
    public function getMobile($value)
    {
        try
        {
            return Crypt::decryptString($value);
        }
        catch (Exception $e)
        {
            return $value;
        }
    }

    //------------------------------------------------
    public function setEmail($value)
    {
        $this->attributes['email'] = Crypt::encryptString($value);
    }

    //------------------------------------------------
    public function getEmail($value)
    {
        try
        {
            return Crypt::decryptString($value);
        }
        catch (Exception $e)
        {
            return $value;
        }
    }

    //------------------------------------------------
    public function setEmailHash($value)
    {
        $this->attributes['email_hash'] = hash('sha256', $value);
    }

    //------------------------------------------------
    public static function getEmailHash($value)
    {
        return hash('sha256', $value);
    }

  public static function sendMailPassword($type, $email, $lang)
  {
    $email_hash = Customer::getEmailHash($email);
    if (isset($email_hash)) {
      //먼저 메일 해시키로 찾는다.
      $items = Customer::where(['type' => $type, 'email_hash' => $email_hash]);
      if ($items->count() === 0) {
        $items = Customer::where(['type' => $type])->whereEncrypted('email', $email);
      }

      if ($items->count() > 0) {
        $customer = (clone $items)->first();
        if ($customer->fail_login_count >= 5) {
          $password = Str::random(6);
          //$password = '123123';//FORTEST

          //SEND MAIL
          $content = view('admin.common.mail.email_password')->with([
            'lang' => $lang, 'type' => $type, 'password' => $password,
            'url_result' => config('app.url_1') . '/search-inquiry?type=' . $type, 'url_main' => config('app.url_1'),
          ])->render();

          $to = $customer->email;
          $to_nm = $customer->cust_nm;

          if (!empty($to)) {
            //고객 메일전송
            $request = new Request();
            $request['from'] = env('ORACLE_MAIL_ADMIN');
            $request['from_nm'] = ($lang == 'ko') ? "신세계건설" : "SHINSEGAE E&C";
            $request['subject'] = ($lang == 'ko') ? "패스워드를 재설정 하였습니다." : "The password has been reset.";
            $request['content'] = $content;
            $request['to'] = $to;
            $request['to_nm'] = $to_nm;
            $ret = (new MailController)->sendmailOne($request);
            if ($ret) {
              $passwordHashed = Customer::getEmailHash($password);
              $items->update(['password' => $passwordHashed, 'fail_login_count' => 0]);
              return true;
            }
          }
        }

        //DB::enableQueryLog();
        $items->update(['fail_login_count' => DB::raw("IFNULL(fail_login_count,0) + 1")]);
        //Log::info(DB::getQueryLog()[0]['query']);
      }
    }
    return false;
  }
}
