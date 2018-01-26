<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number',50)->unique();
            $table->integer('user_id');
            $table->integer('rest_id');
            $table->integer('status');
            $table->integer('price');
            $table->string('order_time',50);
            $table->string('address',50);
            $table->string('text',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_orders');
    }
}
