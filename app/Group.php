<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    protected $fillable = ['name','description','resort_id'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function roles(){
        return $this->hasMany(Role::class);
    }

    public function resort(){
        return $this->belongsTo(Resort::class);
    }

}
