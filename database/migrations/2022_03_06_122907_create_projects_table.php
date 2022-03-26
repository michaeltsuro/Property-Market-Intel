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
            $table->unsignedBigInteger('project_sector_id');
            $table->string('projectname')->unique();
            $table->string('propertyowner'); //we might take the logged user if applicable
            //add other vendors to the project as json object
            //number of units associated with this property
            $table->json('vendors');
            $table->longText('projectoverview');
            $table->string('propertybrochure'); //file
            // $table->enum('projectstatus', ['upcoming', 'ongoing', 'completed']);
            //document for overview
            $table->string('province'); //autocomplete
            $table->string('city'); //autocomplete
            $table->string('address');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_sector_id')->references('id')->on('project_sectors')->onDelete('cascade');
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
