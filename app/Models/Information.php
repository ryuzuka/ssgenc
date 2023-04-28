<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = [
        'id',
        'housing',
        'construct',
        'leisure',
        'civil',
        'hf_age',
        'hf_project',
        'hf_amt',
        'hf_amt_en',
        'cf_age',
        'cf_project',
        'cf_amt',
        'cf_amt_en',
        'ce_age',
        'ce_project',
        'ce_amt',
        'ce_amt_en',
        'lb_age',
        'lb_count',
        'lb_amt',
        'lb_amt_en',
        'ent_age',
        'ent_count',
        'ent_amt',
        'ent_amt_en',
        'created_id',
        'updated_id'
    ];    
}
