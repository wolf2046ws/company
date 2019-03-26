<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentRequest extends Model
{
    //
    protected $table = 'requests';

    protected $fillable = [
        'user_id', 'component_id', 'component_type', 'status'
    ];

    public function file(){
        return $this->belongsTo(AccessFile::class, 'component_id');
    }

    public function software(){
        return $this->belongsTo(Software::class,'component_id');
    }

    public function hardware(){
        return $this->belongsTo(Hardware::class, 'component_id');
    }


}
