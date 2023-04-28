<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'contrib',
        'subject_ko',
        'subject_en',
        'content_ko',
        'content_en',
        'expo_yn',
        'attach_id',
        'created_at',
        'created_id',
        'updated_id'
    ];
}
