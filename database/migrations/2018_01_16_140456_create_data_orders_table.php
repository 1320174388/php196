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
        // 订单表
        Schema::create('data_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');  //订单号
            $table->integer('user_id'); //用户id
            $table->integer('rest_id'); //餐点id
            $table->tinyInteger('status'); //订单状态
            $table->string('order_time', 255); //订单日期
            $table->string('address_id', 255);  //用户地址
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
        Schema::dropIfExists('data_orders');
    }
}
