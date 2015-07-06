<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function ($table) {
            $table->integer('category_id');
            $table->boolean('fatturato');
            $table->float('iva_amount');
            $table->string('filepath');
            $table->date('pagato_il');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function ($table) {
            $table->dropColumn(['category_id','fatturato','iva_amount','filepath','pagato_il']);
        });
    }
}
