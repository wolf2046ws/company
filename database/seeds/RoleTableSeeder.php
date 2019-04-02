<?php

use Illuminate\Database\Seeder;
use App\Group;

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
