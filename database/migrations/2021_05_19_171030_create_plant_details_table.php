<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('growth_rate')->nullable();
            $table->string('light_demand')->nullable();
            $table->string('available_as')->nullable();
            $table->string('placement_in_tank')->nullable();
            $table->string('pH')->nullable();
            $table->string('CO2')->nullable();
            $table->string('care_level')->nullable();
            $table->string('leaves')->nullable();
            $table->string('description')->nullable();
            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade');
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
        Schema::dropIfExists('plant_details');
    }
}
