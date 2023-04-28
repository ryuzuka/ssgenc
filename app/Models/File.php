<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'file_id',
        'file_seq',
        'file_ext',
        'file_size',
        'file_text',
        'file_nm',
        'file_nm_uuid',
        'file_view_id',
        'useflag'
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFilenamesAttribute($value)
    {
        $this->attributes['file_nm'] = json_encode($value);
    }
}
