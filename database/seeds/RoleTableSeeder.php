<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\ldapHelperMethods;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ldapHelper = new ldapHelperMethods();
        $ldapHelper->l_get_all_user();
        $ldapHelper->get_all_disabled_user();
        $ldapHelper->get_all_groups();

        DB::table('roles')->insert([
            'name' => "Admin",
            'group_id' => 1,
            'resort_id' => 1
        ]);
    }
}
