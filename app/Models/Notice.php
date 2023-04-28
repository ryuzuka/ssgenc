<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_gubun',
        'subject',
        'content',
        'expo_yn',
        'image_id',
        'attach_id',
        'youtube_url',
        'shortcut_nm',
        'shortcut_url',
        'shortcut_expo_yn',
        'created_at',
        'created_id',
        'updated_id',
        'useflag'
    ];
}
