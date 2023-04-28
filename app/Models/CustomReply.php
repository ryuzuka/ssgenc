<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomReply extends Model
{
    use HasFactory;

    protected $table = 'customreplys';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'seq',
        'subject',
        'content',
        'charger',
        'attach_id',
        'created_id',
        'updated_id'
    ];    
}
