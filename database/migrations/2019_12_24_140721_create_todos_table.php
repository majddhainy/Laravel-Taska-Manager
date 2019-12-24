<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // php artisan migrate calls all (up's) functions in each migration
    // up fucntion is responsible for creating tables and colomns inside them
    // while php artisan migrate:rollback whell call all (down's) functions in each migration
    // down function  is responsible for dropping the table
    // php artisan migrate:refresh will drop all old then create new ones (rollback,migrate)
    // note u have to update mysql to latest version because laravel new update 
    // set large size for storing emojis inside database ! 
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
