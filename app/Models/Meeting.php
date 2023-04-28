<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    //이걸 설정하면 자동 날짜 등록 기능이 해제 됨.
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'subject',
        'hold_at',
        'created_at',
        'round',
        'vote_st',
        'dir_a_nm',
        'dir_a_yn',
        'dir_b_nm',
        'dir_b_yn',
        'dir_c_nm',
        'dir_c_yn',
        'dir_d_nm',
        'dir_d_yn',
        'updated_at',
        'created_id',
        'updated_id'
    ];      
}
