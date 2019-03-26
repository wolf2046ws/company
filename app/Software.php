<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    //
    protected $fillable = [
        'name'
    ];


    public function users(){
        return $this->belongsToMany(User::class,'requests','component_id')
        ->where('component_type','Software');
    }
}
