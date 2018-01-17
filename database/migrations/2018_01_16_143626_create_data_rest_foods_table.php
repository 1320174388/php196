<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRestFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // 食品
        Schema::create('data_rest_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);     //食品名称
            $table->string('cate_id', 50);  //食品类别
            $table->string('price');   //食品价格
            $table->string('img', 255);     //食品图片
            $table->tinyInteger('stock');   //库存
            $table->tinyInteger('sales');   //销量
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
        Schema::dropIfExists('data_rest_foods');
    }
}
