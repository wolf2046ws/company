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
            'slug' => 'Web',
            'url' => 'get-resort-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Select Group from Dropdown',
            'slug' => 'Web',
            'url' => 'get-group-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Select Role from Dropdown',
            'slug' => 'Web',
            'url' => 'get-role-list.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can See User Detalied Page',
            'slug' => 'Web',
            'url' => 'user.show',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Enabled User Page',
            'slug' => 'Web',
            'url' => 'user.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Disabled User Page',
            'slug' => 'Web',
            'url' => 'user.disabled',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Enable/Disable User ',
            'slug' => 'Web',
            'url' => 'user.changeStatus',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Approve/Reject User Request',
            'slug' => 'Web',
            'url' => 'user.changeStatusApproved',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Create User Page',
            'slug' => 'Web',
            'url' => 'user.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Save Created User',
            'slug' => 'Web',
            'url' => 'user.store',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View User Information ',
            'slug' => 'Web',
            'url' => 'user.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Save Edit User Information ',
            'slug' => 'Web',
            'url' => 'user.update',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete User Information ',
            'slug' => 'Web',
            'url' => 'userData.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Resort-User Page',
            'slug' => 'Web',
            'url' => 'resort.show',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View All Groups',
            'slug' => 'Web',
            'url' => 'group.index',
            'status' => 'true'
        ]);

        /*DB::table('permissions')->insert([
            'description' => 'User Can ResortGroup Index ****',
            'slug' => 'Web',
            'url' => 'resortGroup.index',
            'status' => 'true'
        ]);*/

        DB::table('permissions')->insert([
            'description' => 'User Can View Create Group Page',
            'slug' => 'Web',
            'url' => 'group.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Created Group',
            'slug' => 'Web',
            'url' => 'group.store',
            'status' => 'true'
        ]);


        DB::table('permissions')->insert([
            'description' => 'User Can Create Group in his Resorst ****',
            'slug' => 'Web',
            'url' => 'groupRoles.create',
            'status' => 'true'
        ]);


        DB::table('permissions')->insert([
            'description' => 'User Can View Create Role-Group Page',
            'slug' => 'Web',
            'url' => 'groupRoles.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Group',
            'slug' => 'Web',
            'url' => 'group.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Permission Page',
            'slug' => 'Web',
            'url' => 'permission.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Veiw Create Permission',
            'slug' => 'Web',
            'url' => 'permission.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Created Permission',
            'slug' => 'Web',
            'url' => 'permission.store',
            'status' => 'true'
        ]);


        DB::table('permissions')->insert([
            'description' => 'User Can Delete Permission',
            'slug' => 'Web',
            'url' => 'permission.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Role Page',
            'slug' => 'Web',
            'url' => 'role.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Create Role',
            'slug' => 'Web',
            'url' => 'role.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Save Role',
            'slug' => 'Web',
            'url' => 'role.store',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Role',
            'slug' => 'Web',
            'url' => 'role.destroy',
            'status' => 'true'
        ]);

        ####################################################



        /*
        DB::table('permissions')->insert([
            'description' => 'user can view resort user index page',
            'slug' => 'Web Web',
            'url' => 'resort.index',
            'status' => 'true'
        ]);*/


        /*
        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select resort',
            'slug' => 'Web Web',
            'url' => 'dropdownlist.index',
            'status' => 'true'
        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select Group',
            'slug' => 'Web Web',
            'url' => 'dropdownlist.getGroupList',
            'status' => 'true'
        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can Select Role',
            'slug' => 'Web Web',
            'url' => 'dropdownlist.getRoleList',
            'status' => 'true'
        ]);*/


    }
}
