<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('characteristic_1')->nullable();
            $table->string('characteristic_2')->nullable();
            $table->string('characteristic_3')->nullable();
            $table->string('characteristic_4')->nullable();
            $table->string('treat_for')->nullable();
            $table->string('product_details')->nullable();
            $table->string('instructions')->nullable();
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
        Schema::dropIfExists('medicines_details');
    }
}
