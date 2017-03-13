<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seeed
        DB::table('users')->insert([
        	'name' => 'Adminstrador',
            'email' => 'admin@test.com',
            'password' => bcrypt('123'),
            'address' => 'Administrador',
            'state' => 'A',
            'type' => 'A'
        	]);

        DB::table('users')->insert([
            'name' => 'Invitado',
            'email' => 'invitado@test.com',
            'password' => bcrypt('123'),
            'address' => 'Invitado',
            'state' => 'A',
            'type' => 'U'
            ]);


    }
}
