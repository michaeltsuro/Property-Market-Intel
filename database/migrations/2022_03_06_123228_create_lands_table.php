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
            //land prices
            $table->double('lowerlimitprice');
            $table->double('upperlimitprice');
            //usd equivalent changes depending on markets, what is the best solution here
            $table->double('usdequivalent');
            //this should trigger an event that sales table will be updated when land is sold
            $table->boolean('is_sold')->default(false);
            //we have to also store images for the land
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
