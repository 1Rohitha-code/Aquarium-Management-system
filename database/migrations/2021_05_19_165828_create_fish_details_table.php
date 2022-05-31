<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('care_level')->nullable();
            $table->string('color_form')->nullable();
            $table->string('temperament')->nullable();
            $table->string('feeding')->nullable();
            $table->string('water_condition')->nullable();
            $table->string('size')->nullable();
            $table->string('behaviour')->nullable();
            $table->string('fish_type')->nullable();
            $table->string('breeding_time')->nullable();
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
        Schema::dropIfExists('fish_details');
    }
}
