<?php

use Illuminate\Database\Seeder;

use App\ldapUsers;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    // Select Dropdown List for Resort - Group - Role
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

    // User
        DB::table('permissions')->insert([
            'description' => 'User Can View User Detailed Page',
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
            'description' => 'User Can View Edit User Page',
            'slug' => 'Web',
            'url' => 'user.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Save Edited User',
            'slug' => 'Web',
            'url' => 'user.update',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete User Permission',
            'slug' => 'Web',
            'url' => 'userData.destroy',
            'status' => 'true'
        ]);

    //Resort
        DB::table('permissions')->insert([
            'description' => 'User Can View Resort Page',
            'slug' => 'Web',
            'url' => 'resort.show',
            'status' => 'true'
        ]);
    //Groups
        DB::table('permissions')->insert([
            'description' => 'User Can View All Groups',
            'slug' => 'Web',
            'url' => 'group.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Detalied Groups',
            'slug' => 'Web',
            'url' => 'group.show',
            'status' => 'true'
        ]);


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
            'description' => 'User Can View Edit Group Page',
            'slug' => 'Web',
            'url' => 'group.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Edited Group',
            'slug' => 'Web',
            'url' => 'group.update',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Group',
            'slug' => 'Web',
            'url' => 'group.destroy',
            'status' => 'true'
        ]);

    //Need To verify
        DB::table('permissions')->insert([
            'description' => 'User Can Create Group in his Resorst ****########',
            'slug' => 'Web',
            'url' => 'groupRoles.create',
            'status' => 'true'
        ]);

    //Permissions
        DB::table('permissions')->insert([
            'description' => 'User Can View Permission Page',
            'slug' => 'Web',
            'url' => 'permission.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Create Permission Page',
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
            'description' => 'User Can View Edit Permission Page',
            'slug' => 'Web',
            'url' => 'permission.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Edited Permission',
            'slug' => 'Web',
            'url' => 'permission.update',
            'status' => 'true'
        ]);


        DB::table('permissions')->insert([
            'description' => 'User Can Delete Permission',
            'slug' => 'Web',
            'url' => 'permission.destroy',
            'status' => 'true'
        ]);

    //Roles
        DB::table('permissions')->insert([
            'description' => 'User Can View Role Page',
            'slug' => 'Web',
            'url' => 'role.index',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Role Detailed Page',
            'slug' => 'Web',
            'url' => 'role.show',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Create Role Page',
            'slug' => 'Web',
            'url' => 'role.create',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Created Role',
            'slug' => 'Web',
            'url' => 'role.store',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Edit Role Page',
            'slug' => 'Web',
            'url' => 'role.edit',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Store Edited Role',
            'slug' => 'Web',
            'url' => 'role.update',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Delete Role',
            'slug' => 'Web',
            'url' => 'role.destroy',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can Sync Database With AD',
            'slug' => 'Web',
            'url' => 'user.syncDatabaseWithAD',
            'status' => 'true'
        ]);

        DB::table('permissions')->insert([
            'description' => 'User Can View Logs',
            'slug' => 'Web',
            'url' => 'logs',
            'status' => 'true'
        ]);

    }
}
