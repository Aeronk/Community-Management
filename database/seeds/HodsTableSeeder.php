<?php

use Illuminate\Database\Seeder;

class HodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();

        \App\Hod::unguard();

   // $table->integer('denomination_id')->unsigned();
   //          $table->string('title');
   //          $table->string('first_name');
   //          $table->string('last_name');
   //          $table->string('home_tel');
   //          $table->string('email');
   //          $table->string('marital_status');
   //          $table->string('gender');
   //          $table->string('hod_or_rep');

        \App\Hod::create([
        	        	'denomination_id' => 1,
        	'title' => $faker->randomElement(['Mr', 'Mrs', 'Miss']),
        	'first_name' => $faker->firstName,
        	'last_name' => $faker->lastName,
        	'home_tel' => $faker->phoneNumber,
        	'email' => $faker->email,
        	'marital_status' => $faker->randomElement(['married', 'single', 'divorced', 'single parent']),
        	'gender' => $faker->randomElement(['male', 'female']),
        	'hod_or_rep' => $faker->randomElement(['hod', 'rep'])
        ]);
    }
}
