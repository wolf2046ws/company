<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolePermissionTableSeeder extends Seeder
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
          // code...
          foreach (Permission::all() as $permission) {
            // code...
            DB::table('role_permission')->insert([
                'role_id' => $role->id,
                'permission_id' => $permission->id
            ]);
          }
        }
    }
}
