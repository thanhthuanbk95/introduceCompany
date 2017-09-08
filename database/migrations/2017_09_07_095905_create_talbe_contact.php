<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalbeContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact',function (Blueprint $table){
            $table->increments('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('content');
            $table->timestamps();
            $table->string('reply');
            $table->integer('id_user');
            $table->timestamp('reply_time');
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
