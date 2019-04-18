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
        'comment',

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
        return $this->belongsToMany(Resort::class);
    }


    public function group(){
        return $this->belongsToMany(Group::class);
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
        $roles_new = UserData::select('role_id')
        ->where('user_id',$this->id)
        ->where('is_approved','=','1')
        ->get();

        //dd($roles_new);
        //$roles = UserData::select('role_id')->where('user_id',$this->id)->get();
        //$permissions = RolePermissions::whereIn('role_id',$roles)->distinct()->get(['permission_id'])->toArray();
        $permissions = RolePermissions::whereIn('role_id',$roles_new)->distinct()->get(['permission_id'])->toArray();
        $permissions = Permission::select('url','description')
                        ->whereIn('id',$permissions)
                        ->where('slug','Web')
                        ->get();
        return $permissions;
    }


}
