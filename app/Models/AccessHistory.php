<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessHistory extends Model
{
    use HasFactory;

    protected $table = 'accesshistories';

    protected $fillable = [
        'id',
        'access_id',
        'menu_id',
        'reason',
        'approved_id',
        'access_state',
        'login_ip',
        'created_id',
        'updated_id'
    ];
}
