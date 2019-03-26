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
            'url' => 'user.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new user',
            'slug' => 'Users',
            'url' => 'user.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can view User data page',
            'slug' => 'Users',
            'url' => 'user.show'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update User',
            'slug' => 'Users',
            'url' => 'user.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete other User',
            'slug' => 'Users',
            'url' => 'user.Destroy'
        ]);

        //department URL
        DB::table('permissions')->insert([
            'description' => 'user can view departments index page',
            'slug' => 'Department',
            'url' => 'department.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new department',
            'slug' => 'Department',
            'url' => 'department.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update department',
            'slug' => 'Department',
            'url' => 'department.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete department',
            'slug' => 'Department',
            'url' => 'department.Destroy'
        ]);


        //resort URL
        DB::table('permissions')->insert([
            'description' => 'user can view resort index page',
            'slug' => 'Resort',
            'url' => 'resort.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new resort',
            'slug' => 'Resort',
            'url' => 'resort.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update resort',
            'slug' => 'Resort',
            'url' => 'resort.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete resort',
            'slug' => 'Resort',
            'url' => 'resort.Destroy'
        ]);


        //group URL
        DB::table('permissions')->insert([
            'description' => 'user can view group index page',
            'slug' => 'Group',
            'url' => 'group.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new group',
            'slug' => 'Group',
            'url' => 'group.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update group',
            'slug' => 'Group',
            'url' => 'group.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete group',
            'slug' => 'Group',
            'url' => 'group.Destroy'
        ]);

        //permission URL
        DB::table('permissions')->insert([
            'description' => 'user can view permission index page',
            'slug' => 'Permission',
            'url' => 'permission.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new permission',
            'slug' => 'Permission',
            'url' => 'permission.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update permission',
            'slug' => 'Permission',
            'url' => 'permission.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete permission',
            'slug' => 'Permission',
            'url' => 'permission.Destroy'
        ]);

        //role URL
        DB::table('permissions')->insert([
            'description' => 'user can view role index page',
            'slug' => 'Role',
            'url' => 'role.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new role',
            'slug' => 'Role',
            'url' => 'role.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update role',
            'slug' => 'Role',
            'url' => 'role.edit'
        ]);
        
        DB::table('permissions')->insert([
            'description' => 'user can delete role',
            'slug' => 'Role',
            'url' => 'role.Destroy'
        ]);

        //resort-user URL
        DB::table('permissions')->insert([
            'description' => 'user can view resort user index page',
            'slug' => 'Resort Users',
            'url' => 'resort-users.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new user in your resort',
            'slug' => 'Resort Users',
            'url' => 'resort-users.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update user data in your resort',
            'slug' => 'Resort Users',
            'url' => 'resort-users.edit'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can delete users in your resort',
            'slug' => 'Resort Users',
            'url' => 'resort-users.Destroy'
        ]);



        //department-user URL
        DB::table('permissions')->insert([
            'description' => 'user can view department user index page',
            'slug' => 'Department Users',
            'url' => 'department-users.index'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can create new user in your department',
            'slug' => 'Department Users',
            'url' => 'department-users.create'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can update user data in your department',
            'slug' => 'Department Users',
            'url' => 'department-users.edit'
        ]);

        DB::table('permissions')->insert([
            'description' => 'user can delete users in your department',
            'slug' => 'Department Users',
            'url' => 'department-users.Destroy'
        ]);

        

        

        
        

    }
}
