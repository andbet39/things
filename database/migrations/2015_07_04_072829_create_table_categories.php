<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('color', 10);
            $table->date('created_at');
            $table->date('updated_at');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('users');
        Schema::drop('categories');

    }
}
