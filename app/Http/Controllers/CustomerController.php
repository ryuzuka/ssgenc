<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    const __CLAZZ__ = 'customer-';
    const err_insert_invalid = self::__CLAZZ__.'E001';
    const err_insert_failure = self::__CLAZZ__.'E002';
    const err_delete_failure = self::__CLAZZ__.'E003';

    public function __construct()
    {
        $this->setModel('App\Models\Customer');
    }

    //-------------------------------------------
    public function index(Request $request)
    {
    }

    //-------------------------------------------
    public function store(Request $request)
    {
        $item = null;
        $cust_id = 0;
        $mobile = null;

        try
        {
            $cust_id = $request['cust_id'];
            if ( isset($cust_id) )
            {
                $item = Customer::find($cust_id);
                $item->cust_id = $cust_id;
            }
            else
            {
                $item = new Customer();
                $cust_id = Customer::max('cust_id') + 1;
                $item->cust_id = $cust_id;
            }

            if ( empty($request['mobile']) )
            {
                $mobile = '--';
            }
            else{
                $mobile = $request['mobile'];
            }

            $email_hash = $item->setEmailHash($request['email']);

            $item->type                 = $request['type'];
            $item->cust_nm              = $cust_nm;
            $item->mobile               = $mobile;
            $item->phone                = "";
            $item->email                = $email;
            $item->email_hash           = $email_hash;
            $item->adult_yn             = $request['adult_yn'];
            $item->privacy_info_yn      = $request['privacy_info_yn'];
            $item->privacy_policy_yn    = $request['privacy_policy_yn'];
            $item->company_cd           = (isset($request['company_cd']))?$request['company_cd']:"";
            $item->password             = $request['password'];
            $item->save();
        }
        catch(Exception $e)
        {
            return 0;
        }
        finally
        {
        }

        return $cust_id;
    }

    //-------------------------------------------
    public function get($cust_id)
    {
        $item = Customer::find($cust_id);
        if (isset($item))
        {
            return $item;
        }

        return null;
    }

    //-------------------------------------------
    public function show(Request $request)
    {
        $type = $request['type'];
        $email = $request['email'];
        $password = $request['password'];
        $item = null;

        if ( isset($email) && isset($password) )
        {
            //이메일 해시키를 얻는다.
            $email_hash = Customer::getEmailHash($email);
            if (isset($email_hash))
            {
                //먼저 메일 해시키로 찾는다.
                $item = Customer::where([
                    'type' => $type,
                    'email_hash' => $email_hash,
                    'password' => $password,
                ])->orderBy('created_at', 'desc')->first();

                if ( !isset($item) )
                {
                    $item = Customer::where([
                        'type' => $type,
                        'password' => $password,
                    ])->whereEncrypted('email', $email)->orderBy('created_at', 'desc')->first();
                }
            }

            if ( isset($item) )
            {
                return $item;
            }
        }

        return null;
    }

    //-------------------------------------------
    //고객 정보를 복수개 조회 가능하도록 수정 필요.
    public function showMulti(Request $request)
    {
        $type = $request['type'];
        $email = $request['email'];
        $password = $request['password'];
        $items = null;

        if ( isset($email) && isset($password) )
        {
            //이메일 해시키를 얻는다.
            $email_hash = Customer::getEmailHash($email);
            if (isset($email_hash))
            {
                //먼저 메일 해시키로 찾는다.
                $items = Customer::where([
                    'type' => $type,
                    'email_hash' => $email_hash,
                    'password' => $password,
                ])->orderBy('created_at', 'desc')->get();

                if ( !isset($items) || sizeof($items) == 0)
                {
                    $items = Customer::where([
                        'type' => $type,
                        'password' => $password,
                    ])->whereEncrypted('email', $email)->orderBy('created_at', 'desc')->get();
                }
            }

            if ( isset($items) && sizeof($items) > 0)
            {
                return $items;
            }
        }

        return null;
    }

    //-------------------------------------------
    public function upload(Request $request)
    {
        $item = null;
        $cust_id = 0;
        $mobile = null;

        $r = $request->input();
        $data = json_decode($r['data'], true);

        try
        {
            if ( isset($data['cust_id']) )
            {
                $cust_id = $data['cust_id'];
                $item = Customer::find($cust_id);
            }
            else
            {
                $item = new Customer();
                $cust_id = Customer::max('cust_id') + 1;
                $item->cust_id = $cust_id;
                $item->phone = '';
            }

            if ( empty($data['mobile']) )
            {
                $mobile = '--';
            }
            else
            {
                $mobile = $data['mobile'];
            }

            $item->fill($data);

            $item->setEmailHash($data['email']);
            $item->save();
        }
        catch(Exception $e)
        {
            return 0;
        }
        finally
        {
        }

        return $cust_id;
    }

}
