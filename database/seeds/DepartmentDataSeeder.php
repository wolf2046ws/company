<?php

use Illuminate\Database\Seeder;

class DepartmentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            'name' => "IT"
        ]);

        DB::table('departments')->insert([
            'name' => "Call Center"
        ]);

        DB::table('departments')->insert([
            'name' => "Reception"
        ]);
    }
}
