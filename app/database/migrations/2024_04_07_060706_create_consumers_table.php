<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '10');
            $table->string('email');
            $table->string('password', '10');
            $table->string('reset_password', '10')->nullable();
            $table->string('image')->nullable();
            $table->string('profile', '300')->nullable();
            $table->integer('group')->default(1);
            $table->boolean('stop_flg')->nullable();
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
        Schema::dropIfExists('consumers');
    }
}
