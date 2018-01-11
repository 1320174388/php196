<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addr', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 50)->unique();
            $table->string('password',255)->unique();
            $table->string('email',255)->unique();
            $table->string('phone',11)->unique();
            $table->smallInteger('status')->unique();
            // $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addr');
    }
}
