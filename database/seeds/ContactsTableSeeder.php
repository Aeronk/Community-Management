<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            //         $table->integer('denomination_id')->unsigned();
            // $table->string('fafullname');
            // $table->string('facontact_number');
            // $table->string('wfullname');
            // $table->string('wcontact_number');
            // $table->string('wemail');
            // $table->string('yfullname');
            // $table->string('ycontact_number');
            // $table->string('yemail');
            // 
            
                	$faker = \Faker\Factory::create();

        \App\Contact::unguard();

        \App\Contact::create([

        	'denomination_id' => 1,
        	'fafullname' => $faker->name,
        	'facontact_number' => $faker->phoneNumber,
        	'faemail' => $faker->phoneNumber,        	
        	'wfullname' => $faker->name,
        	'wcontact_number' => $faker->phoneNumber,
        	'wemail' => $faker->phoneNumber,        	
        	'yfullname' => $faker->name,
        	'ycontact_number' => $faker->phoneNumber,
        	'yemail' => $faker->phoneNumber,
        ]);
    }
}
