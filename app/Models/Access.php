<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $primaryKey = 'access_id';

    protected $fillable = [
        'access_id',
        'menu_id',
        'access_nm',
        'useflag',
        'created_at',
        'updated_at'
    ];    
}
