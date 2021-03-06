<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEnterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_enter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flag')->default('E');
            $table->string('link'); // naver, kakao, facebook ....
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('nickname');
            $table->string('nation');
            $table->string('gukgi');
            $table->integer('code')->unsigned();
            $table->string('phone');
            $table->string('image');
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
        Schema::drop('users');
    }
}

