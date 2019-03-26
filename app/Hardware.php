<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    //
    protected $fillable = [
        'name', 'model'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'requests', 'component_id')
            ->where('component_type', 'Hardware');
    }
}
