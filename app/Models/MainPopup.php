<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPopup extends Model
{
    use HasFactory;

    protected $table = 'mainpopups';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'subject',
        'descript',
        'url',
        'link_text',
        'expo_yn',
        'attach_id'
    ];    
}
