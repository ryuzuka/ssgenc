<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_id';
    protected $keyType = 'string';
    public $incrementing = false;

    //@dkjung-issue : 현재 스크립트로 만드는 방법만 알고 있음.
    //migrate 로는 어떻게?
    // ALTER TABLE codes ADD PRIMARY KEY(code_id, codegroup_id);

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code_id',
        'codegroup_id',
        'code_nm',
        'code_nm_en',
        'useflag',
        'view'
    ];

}
