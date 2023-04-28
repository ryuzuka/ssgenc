<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codegroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'codegroup_id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'codegroup_id',
        'codegroup_nm',
        'remark',
        'useflag'
    ];    
}
