<?php

use Illuminate\Database\Seeder;

class SoftwareDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('software')->insert([
            'name' => "Microsoft Word"
        ]);

        DB::table('software')->insert([
            'name' => "Adobe Reader"
        ]);

        DB::table('software')->insert([
            'name' => "Calculator"
        ]);
    }
}
