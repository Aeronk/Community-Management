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
        $this->call(DenominationsTableSeeder::class);
        $this->call(HodsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CommissionsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
    }
}
