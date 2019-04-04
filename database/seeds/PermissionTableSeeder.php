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
        ####################################################
        DB::table('permissions')->insert([
            'description' => 'User Can Select Resort from Dropdown',
            'slug' => 'Users',
            'url' => 'get-resort-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Select Group from Dropdown',
            'slug' => 'Users',
            'url' => 'get-group-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Select Role from Dropdown',
            'slug' => 'Users',
            'url' => 'get-role-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Enabled User Page',
            'slug' => 'Users',
            'url' => 'user.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Disabled User Page',
            'slug' => 'Users',
            'url' => 'user.disabled',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Enable/Disable User ',
            'slug' => 'Users',
            'url' => 'user.changeStatus',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Approve/Reject User Request',
            'slug' => 'Users',
            'url' => 'user.changeStatusApproved',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Create User Page',
            'slug' => 'Users',
            'url' => 'user.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Save Created User',
            'slug' => 'Users',
            'url' => 'user.store',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Edit User Information ',
            'slug' => 'Users',
            'url' => 'user.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete User Information ',
            'slug' => 'Users',
            'url' => 'userData.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Resort-User Page',
            'slug' => 'Resort',
            'url' => 'resort.show',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View All Groups',
            'slug' => 'Group',
            'url' => 'group.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Create Group',
            'slug' => 'Group',
            'url' => 'group.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Group',
            'slug' => 'Group',
            'url' => 'group.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Permission Page',
            'slug' => 'Permission',
            'url' => 'permission.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Create Permission',
            'slug' => 'Permission',
            'url' => 'permission.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Permission',
            'slug' => 'Permission',
            'url' => 'permission.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Role Page',
            'slug' => 'Role',
            'url' => 'role.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Create Role',
            'slug' => 'Role',
            'url' => 'role.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Role',
            'slug' => 'Role',
            'url' => 'role.destroy',
            'status' => 'true'
        ]);

        ####################################################



        /*
        DB::table('permissions')->insert([
            'description' => 'user can view resort user index page',
            'slug' => 'Resort Users',
            'url' => 'resort.index',
            'status' => 'true'
        ]);*/


        /*
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
        ]);*/


    }
}
