<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//we have 3 different sets of users
            $table->string('projectName')->unique();
            $table->string('propertyOwner'); //we might take the logged user if applicable
            // $table->enum('propertyType', ['residential','office']); //put it in building specification table
            //add other vendors to the project as json object
            $table->json('vendors');
            $table->longText('projectOverview');
            $table->enum('projectStatus', ['upcoming', 'ongoing', 'completed']);
            //document for overview
            $table->string('address');
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
        Schema::dropIfExists('projects');
    }
}
