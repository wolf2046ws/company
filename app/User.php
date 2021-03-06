<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name',
        'description',
        'initials',
        'title',

        'user_id',
        'first_name',
        'last_name',
        'user_name',
        'status',
        'is_admin',

        'email',
        'password'
    ];

    protected $memberOf = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function resort(){
        return $this->belongsTo(Resort::class);
    }


    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function checkPermission($permissionName){

        foreach($this->permissions() as $permission){
            if($permission->url == $permissionName){
                return true;
            }
        }
        
        return false;
    }


    public function permissions(){
        $roles = UserData::select('role_id')->where('user_id',$this->id)->get();
        $permissions = RolePermissions::whereIn('role_id',$roles)->distinct()->get(['permission_id'])->toArray();
        $permissions = permission::select('url','description')->whereIn('id',$permissions)->get();
        return $permissions;
    }


}
