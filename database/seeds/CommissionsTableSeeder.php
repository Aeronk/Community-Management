<?php

use Illuminate\Database\Seeder;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          	$faker = \Faker\Factory::create();

        \App\Commission::unguard();

            // $table->increments('id');
            // $table->integer('denomination_id')->unsigned();
            // $table->string('research_and_dev');
            // $table->string('gender_dev');
            // $table->string('humanitarian');
            // $table->string('peace_justice');
            // $table->string('comm_for_min');

        \App\Commission::create([
        	        	'denomination_id' => 1,
        	'research_and_dev' => $faker->text,
        	'gender_dev' => $faker->text,
        	'humanitarian' => $faker->text,
        	'peace_justice' => $faker->text,
        	'comm_for_min' => $faker->text,
        ]);
    }
}
