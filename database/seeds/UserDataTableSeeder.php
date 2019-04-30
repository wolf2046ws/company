<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_data')->insert([
            'user_id' => 5,
            'resort_id' => 1,
            'group_id' => 1,
            'role_id' => 1,
            'is_approved' => 1
        ]);

    }
}
