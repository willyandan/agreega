<?php

use Illuminate\Database\Seeder;

class MatterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matters')->insert([
        	'matter' => 'Matemática',
        	'id_person' => 2,
        	'id_school' => 1,
        ]);
    }
}
