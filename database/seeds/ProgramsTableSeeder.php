<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                  	$faker = \Faker\Factory::create();

        \App\Program::unguard();

            // $table->increments('id');
            // $table->integer('denomination_id')->unsigned();
            // $table->string('research_and_dev');
            // $table->string('gender_dev');
            // $table->string('humanitarian');
            // $table->string('peace_justice');
            // $table->string('comm_for_min');

        \App\Program::create([
        	'denomination_id' => 1,
        	'programs' => $faker->text,
        ]);
    }
}
