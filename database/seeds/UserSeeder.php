<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "lucas felix bastos",
            'email' => "felixbastos.lucas@gmail.com",
            'password' => Hash::make('asdqwe123'),
            "perfil" => 1
        ]);
    }
}
