<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
    }
}
