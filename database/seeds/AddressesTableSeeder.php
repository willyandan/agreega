<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'state' => 'SP',
            'city' => 'caçapava',
            'neighborhood' => 'CIDADE',
            'street' => 'R. da ETEC',
            'number' => '1'
        ]);

        DB::table('addresses')->insert([
        	'state' => 'SP',
        	'city' => 'caçapava',
        	'neighborhood' => 'Panorama',
        	'street' => 'R. Amilcar Carlota Romano',
        	'number' => '311'
       	]);
    }
}
