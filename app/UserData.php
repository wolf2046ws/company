<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $table = 'users_data';

    protected $fillable = ['user_id','resort_id','group_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
