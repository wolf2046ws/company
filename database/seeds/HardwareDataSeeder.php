<?php

use Illuminate\Database\Seeder;

class HardwareDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hardware')->insert([
            'name' => "PC",
            'model' => "Toshiba 520TM"
        ]);

        DB::table('hardware')->insert([
            'name' => "Monitor",
            'model' => "Pansonic 220/240 LCD"
        ]);

        DB::table('hardware')->insert([
            'name' => "Mouse",
            'model' => "LG 496-Speed"
        ]);

        DB::table('hardware')->insert([
            'name' => "Laptop",
            'model' => "MAC Book Air"
        ]);

    }
}
