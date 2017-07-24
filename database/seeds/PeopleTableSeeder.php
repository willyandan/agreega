<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
        	'name' => 'Willyan Antunes',
            'birthday' => '1999-08-29',
        	'id_user' => 1,
        	'id_address' => 2,
        	'id_type' => 3,
        	'id_school' => 1
        ]);
        DB::table('people')->insert([
            'name' => 'Marcelo Cauã Freitas',
            'birthday' => '1978-12-04',
            'id_user' => 2,
            'id_address' => 3,
            'id_type' => 2,
            'id_school' => 1
        ]);
        DB::table('people')->insert([
            'name' => 'Marcos Beirute Junior',
            'birthday' => '1987-04-01',
            'id_user' => 3,
            'id_address' => 3,
            'id_type' => 2,
            'id_school' => 1
        ]);
    }
}
