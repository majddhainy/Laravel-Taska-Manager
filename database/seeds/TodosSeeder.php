<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // call the factory that u created u can give number of generations u need (ex : 10)
        // 10 random rows are generated in the table TODOS 
        factory(App\Todo::class ,5)->create();
    }
}
