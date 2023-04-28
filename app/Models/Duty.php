<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'duty_nm',
        'part_nm',
        'duty_desc',
        'name',
        'interview',
        'attach_id',
        'expo_yn',
        'created_at',
        'created_id',
        'updated_id'
    ];
}
