<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'commit_type',
        'subject',
        'hold_at',
        'created_at',
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
