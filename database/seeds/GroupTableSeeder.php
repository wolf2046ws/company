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
        foreach (Resort::all() as $resort) {
          DB::table('groups')->insert([
              'name' => $resort->name.' Admin',
              'description' => 'This is resort: '.$resort->name.' Admin',
              'resort_id' => $resort->id
          ]);
        }

    }
}
