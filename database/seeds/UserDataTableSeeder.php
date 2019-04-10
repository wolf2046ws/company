<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (Role::all() as $role) {
          DB::table('users_data')->insert([
              'user_id' => 172,
              'group_id' => $role->group_id,
              'resort_id' => $role->resort_id,
              'role_id' => $role->id,
              'is_approved' => 1
          ]);
          DB::table('users_data')->insert([
              'user_id' => 159,
              'group_id' => $role->group_id,
              'resort_id' => $role->resort_id,
              'role_id' => $role->id,
              'is_approved' => 1
          ]);
          DB::table('users_data')->insert([
              'user_id' => 161,
              'group_id' => $role->group_id,
              'resort_id' => $role->resort_id,
              'role_id' => $role->id,
              'is_approved' => 1
          ]);
        }
    }
}
