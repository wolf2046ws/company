<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessFile extends Model
{
    //
    protected $fillable = [
        'name', 'file_path', 'server_data'
    ];

}
