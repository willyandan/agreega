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
        	'id_user' => 1,
        	'id_address' => 2,
        	'id_type' => 3,
        	'id_school' => 1
        ]);
    }
}
