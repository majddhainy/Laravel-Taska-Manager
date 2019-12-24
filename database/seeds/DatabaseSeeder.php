<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // here u call the seeder u want
        // automatically the function (run) of the seeder that u  want will be called 
        $this->call(TodosSeeder::class);
    }
}
