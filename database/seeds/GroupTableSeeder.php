<?php

use Illuminate\Database\Seeder;
use App\Resort;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

          DB::table('groups')->insert([
              'name' => 'Super Admin',
              'description' => 'Has all access to Webportal',
              'resort_id' => 1
          ]);


    }
}
