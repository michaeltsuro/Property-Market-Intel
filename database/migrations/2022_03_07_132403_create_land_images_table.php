<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_id');
            //A list of images for a particular project stored in 1 column
            $table->json('images');
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
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
        Schema::dropIfExists('land_images');
    }
}
