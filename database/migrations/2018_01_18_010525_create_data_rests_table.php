<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_rests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('user_id');
            $table->char('cityCode',6);
            $table->string('nameid',6);
            $table->string('numberid',18);
            $table->string('phone',11);
            $table->string('introduce',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_rests');
    }
}
