<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'msg_acc',
        'key_msg_ko',
        'key_msg_en',
        'key_msg_desc_ko',
        'key_msg_desc_en',
        'url',
        'url_en',
        'link_text_ko',
        'link_text_en',
        'data_1_ko',
        'data_1_en',
        'desc_1_ko',
        'desc_1_en',
        'data_2_ko',
        'data_2_en',
        'desc_2_ko',
        'desc_2_en',
        'expo_yn',
        'attach_id',
        'created_id',
        'updated_id'
    ];
}
