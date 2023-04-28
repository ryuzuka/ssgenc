<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomQuestion extends Model
{
    use HasFactory, EncryptedAttribute;

    protected $table = 'customquestions';

    protected $fillable = [
        'cust_id',
        'type',
        'gubun',
        'subject',
        'content',
        'reply_yn',
        'name_yn',
        'reply_flag',
        'address',
        'gu',
        'gfa',
        'household',
        'land_area',
        'usage',
        'floors_no',
        'basement_no',
        'contract_amt',
        'lang',
        'password',
        'created_id',
        'updated_id',
        'attach_id',
        'accuser_nm',
        'part_nm'
    ];

    /**
     * The attributes that should be encrypted on save.
     *
     * @var array
     */
    protected $encryptable = [
        'address'
    ];

    public static function getTypeName($type) {
      $result = ['01' => '고객상담', '02' => '제보'];
      return $result[$type];
    }

}
