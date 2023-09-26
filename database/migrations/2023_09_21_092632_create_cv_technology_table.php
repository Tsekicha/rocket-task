<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_technology', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id');
            $table->unsignedBigInteger('technology_id');
            $table->timestamps();

            $table->foreign('cv_id')->references('id')->on('c_v_s')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_technology');
    }
}
