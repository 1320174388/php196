<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUserCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        //购物车
        Schema::create('data_user_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('food_id');
            $table->tinyInteger('number');
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
        Schema::dropIfExists('data_user_carts');
    }
}
