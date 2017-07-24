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
            'ra' => '',
            'password' => Hash::make('spider03')
        ]);
        DB::table('users')->insert([
        	'login' => 'marcelo',
        	'email' => 'ckmonteiro@folha.com.br',
            'ra' => '',
        	'password' => Hash::make('marcelo02')
        ]);
        DB::table('users')->insert([
            'login' => 'marcos',
            'email' => 'marcos_ze@folha.com.br',
            'ra' => '',
            'password' => Hash::make('marcos01')
        ]);
    }
}
