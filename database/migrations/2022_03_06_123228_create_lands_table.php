<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('landname');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->bigInteger('landsize');
            $table->string('landoverview');
            $table->string('landbronchure');
            $table->double('lowerlimitprice'); //land prices
            $table->double('upperlimitprice'); //land prices
            $table->double('usdequivalent'); //usd equivalent changes depending on markets, what is the best solution here
            $table->boolean('is_sold')->default(false);  //this should trigger an event that sales table will be updated when land is sold
            //also land status in terms of being bought or not
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('lands');
    }
}
