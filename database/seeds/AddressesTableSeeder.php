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
            'cep' => '36051305',
            'id_city' => 3508504,
            'neighborhood' => 'CIDADE',
            'street' => 'R. da ETEC',
            'number' => '1'
        ]);

        DB::table('addresses')->insert([
            'cep' => '65605230',
        	'id_city' => 3508504,
        	'neighborhood' => 'Panorama',
        	'street' => 'R. Amilcar Carlota Romano',
        	'number' => '311',
            'complement' => 'Perto do prédio amarelo'
       	]);
        DB::table('addresses')->insert([
            'cep' => '69908868',
            'id_city' => 1200401,
            'neighborhood' => 'Loteamento Santo Afonso',
            'street' => 'Rua Arivaldo Juvenil do Vale',
            'number' => '938',
            'complement' => 'Perto do prédio amarelo'
        ]);
    }
}
