<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->bigInteger('grossLeasableArea');
            $table->integer('numberofUnits');
            $table->integer('floortoceilingheight');
            $table->integer('numberoffloors');
            $table->double('estimatedvalue');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('building_specifications');
    }
}
