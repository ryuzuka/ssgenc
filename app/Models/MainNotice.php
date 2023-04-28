<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainNotice extends Model
{
    use HasFactory;

    protected $table = 'mainnotices';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'subject_ko',
        'subject_en',
        'url',
        'link_text_ko',
        'link_text_en',
        'expo_yn'
    ];
}
