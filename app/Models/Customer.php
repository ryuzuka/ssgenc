<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
