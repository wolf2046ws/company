<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description','group_id' , 'resort_id'];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission');
    }

    public function users(){
        return $this->hasMany(UserData::class);
    }

    public function group(){
      return $this->belongsTo(Group::class);
    }

    public function resort(){
        return $this->belongsTo(Resort::class);
    }


}
