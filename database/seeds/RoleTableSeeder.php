<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            array(
                'role' => 'TOURIST GUIDE',

            ),
            array(
                'role' => 'DRIVER',

            ),
            array(
                'role' => 'TOURIST',

            ),
            array(
                'role' => 'Admin',

            ),
        ));
    }
}
