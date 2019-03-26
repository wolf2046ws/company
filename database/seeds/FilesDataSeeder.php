<?php

use Illuminate\Database\Seeder;

class FilesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('access_files')->insert([
            'name' => "Receiption Image"
        ]);

        DB::table('access_files')->insert([
            'name' => "Cars"
        ]);

        DB::table('access_files')->insert([
            'name' => "Design"
        ]);
    }
}
