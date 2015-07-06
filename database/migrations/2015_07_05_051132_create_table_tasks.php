<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->float('due_date');
            $table->boolean('is_completed');
            $table->integer('owner_id');
            $table->integer('assigned_id');
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
        Schema::drop('tasks');

    }
}
