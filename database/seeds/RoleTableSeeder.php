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
        //
        $ldapHelper = new ldapHelperMethods();
        $ldapHelper->l_get_all_user();
        $ldapHelper->get_all_disabled_user();
        $ldapHelper->get_all_groups();

        foreach (Group::all() as $group) {
          DB::table('roles')->insert([
              'name' => $group->name.' Role',
              'description' => 'This is Group: '.$group->name.' Role',
              'group_id' => $group->id,
              'resort_id' => $group->resort_id
          ]);
        }
    }
}
