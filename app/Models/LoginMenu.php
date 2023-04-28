<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginMenu extends Model
{
    use HasFactory;

    protected $table = 'loginmenus';

    protected $fillable = [
        'id',
        'user_id',
        'menu_id',
        'menu_nm',
        'menu_act',
        'login_ip',
        'login_at'
    ]; 
}
