<?php

use Illuminate\Database\Seeder;

class DenominationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();

        \App\Denomination::unguard();

        \App\Denomination::create([
        	'name' => $faker->name,
        	'year_found' => $faker->numberBetween(1000, 2018),
        	'number_of_branches' => $faker->randomNumber,
        	'number_of_members' => $faker->randomNumber,
        	'countries_spread' => $faker->randomNumber,
        	'hq_address' => $faker->address
        ]);
    }
}
