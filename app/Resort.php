<?php

namespace App;
use App\Location;


use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    public $fillable = ['name'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function groups(){
      return $this->hasMany(Group::class);
    }

}
