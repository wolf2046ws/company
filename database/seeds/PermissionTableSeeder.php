<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User URL
        DB::table('permissions')->insert([
            'description' => 'user can view users index page',
            'slug' => 'Users',
            'url' => 'user.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new user',
            'slug' => 'Users',
            'url' => 'user.create',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can view User data page',
            'slug' => 'Users',
            'url' => 'user.edit',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update User',
            'slug' => 'Users',
            'url' => 'user.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can delete user data',
            'slug' => 'Users',
            'url' => 'userData.destroy',
            'status' => 'true'

        ]);


        //resort URL
        DB::table('permissions')->insert([
            'description' => 'user can view resort index page',
            'slug' => 'Resort',
            'url' => 'resort.index',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new resort',
            'slug' => 'Resort',
            'url' => 'resort.create',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update resort',
            'slug' => 'Resort',
            'url' => 'resort.edit',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can delete resort',
            'slug' => 'Resort',
            'url' => 'resort.Destroy',
            'status' => 'true'

        ]);


        //group URL
        DB::table('permissions')->insert([
            'description' => 'user can view group index page',
            'slug' => 'Group',
            'url' => 'group.index',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new group',
            'slug' => 'Group',
            'url' => 'group.create',
            'status' => 'true'

        ]);



        DB::table('permissions')->insert([
            'description' => 'user can delete group',
            'slug' => 'Group',
            'url' => 'group.destroy',
            'status' => 'true'

        ]);

        //permission URL
        DB::table('permissions')->insert([
            'description' => 'user can view permission index page',
            'slug' => 'Permission',
            'url' => 'permission.index',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new permission',
            'slug' => 'Permission',
            'url' => 'permission.create',
            'status' => 'true'

        ]);


        DB::table('permissions')->insert([
            'description' => 'user can delete permission',
            'slug' => 'Permission',
            'url' => 'permission.Destroy',
            'status' => 'true'
        ]);

        //role URL
        DB::table('permissions')->insert([
            'description' => 'user can view role index page',
            'slug' => 'Role',
            'url' => 'role.index',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new role',
            'slug' => 'Role',
            'url' => 'role.create',
            'status' => 'true'

        ]);

        DB::table('permissions')->insert([
            'description' => 'user can delete role',
            'slug' => 'Role',
            'url' => 'role.Destroy',
            'status' => 'true'

        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can view resort user index page',
            'slug' => 'Resort Users',
            'url' => 'resort.index',
            'status' => 'true'
        ]);







        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can See Disabled User Page',
            'slug' => 'Resort Users',
            'url' => 'user.disabled',
            'status' => 'true'
        ]);


        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select resort',
            'slug' => 'Resort Users',
            'url' => 'dropdownlist.index',
            'status' => 'true'
        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select Group',
            'slug' => 'Resort Users',
            'url' => 'dropdownlist.getGroupList',
            'status' => 'true'
        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select Role',
            'slug' => 'Resort Users',
            'url' => 'dropdownlist.getRoleList',
            'status' => 'true'
        ]);


    }
}
