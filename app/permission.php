<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['url','description','slug','status'];

    public function role($id){

        $vars = $this->hasMany(RolePermissions::class)->get();
        foreach($vars as $var){
            if($var->role_id == $id){
                return true;
            }
        }
        return false;
    }
}
