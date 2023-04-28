<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    use HasFactory;

    protected $primaryKey = 'login_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'login_id',
        'user_id',
        'login_ip',
        'in_time',
        'out_time',
        'err_code',
        'err_msg',
        'login_yn'
    ];
}
