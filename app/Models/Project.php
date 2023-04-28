<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'area',
        'biz_area',
        'gubun',
        'name_ko',
        'name_en',
        'main_yn',
        'open_yn',
        'from',
        'to',
        'project_yn',
        'created_at',
        'created_id',
        'updated_id',
        'desc_ko',
        'desc_en',
        'address_ko',
        'address_en',
        'volumn_ko',
        'volumn_en',
        'household_ko',
        'household_en',
        'attach_id'
    ];
}
