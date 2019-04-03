<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users_data';

    protected $fillable = ['user_id','resort_id','group_id','role_id', 'is_approved'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function resort(){
        return $this->belongsTo(Resort::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }

}
