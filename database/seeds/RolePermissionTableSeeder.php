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
        $permissions = Permission::where('slug','Web')->get();

        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'role_id' => 1,
                'permission_id' => $permission->id,
            ]);
        }


    }
}
