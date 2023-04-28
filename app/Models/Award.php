<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'gubun',
        'agency_ko',
        'agency_en',
        'subject_ko',
        'subject_en',
        'expo_yn',
        'attach_id',
        'registed_at',
        'created_id',
        'updated_id'
    ];    
}
