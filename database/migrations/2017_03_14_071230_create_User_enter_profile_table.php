<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEnterProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_enter_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enter_id')->unsigned();
            $table->string('name');
            $table->integer('howmany')->unsigned();
            $table->string('intro');
            $table->string('intro_detail');
            $table->string('contact');
            $table->string('perform_hour');
            $table->string('perform_minutes');
            $table->string('region');
            $table->string('address');
            $table->string('cost');
            $table->string('cost_flag');
            $table->string('career');
            $table->string('recent_perform');
            $table->integer('latitude')->unsigned();
            $table->integer('longitude')->unsigned();
            $table->integer('count')->unsigned();
            $table->integer('bookmark_cnt')->unsigned();
            $table->integer('engchal_cnt')->unsigned();
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
        //
    }
}
