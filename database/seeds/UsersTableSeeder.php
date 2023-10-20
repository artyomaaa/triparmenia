<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '4',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'conf_password' => Hash::make('123456'),
            'image' => '1561121022_Armmontana.jpg',
            'verificate' => '1',
        ]);
    }
}
