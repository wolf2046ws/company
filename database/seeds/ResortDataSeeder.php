<?php

use Illuminate\Database\Seeder;

class ResortDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('resorts')->insert([
            'name' => "Kiel"
        ]);

        DB::table('resorts')->insert([
            'name' => "Boltenhagen"
        ]);

        DB::table('resorts')->insert([
            'name' => "Egestorf"
        ]);

        DB::table('resorts')->insert([
            'name' => "Bad Harzburg"
        ]);

        DB::table('resorts')->insert([
            'name' => "Prerow"
        ]);

        DB::table('resorts')->insert([
            'name' => "Born"
        ]);

        DB::table('resorts')->insert([
            'name' => "Nonnevitz"
        ]);

        DB::table('resorts')->insert([
            'name' => "Göhren"
        ]);

        DB::table('resorts')->insert([
            'name' => "Husum"
        ]);

        DB::table('resorts')->insert([
            'name' => "Tecklenburg"
        ]);

        DB::table('resorts')->insert([
            'name' => "Ladbergen"
        ]);

    }
}
