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
            'login' => 'willyan',
            'email' => 'willyan.dantunes@gmail.com',
            'password' => Hash::make('spider03')
        ]);
        DB::table('users')->insert([
        	'login' => 'marcelo',
        	'email' => 'ckmonteiro@folha.com.br',
        	'password' => Hash::make('marcelo02')
        ]);
    }
}
