<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('order_id')->constrained();   
            $table->integer('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('num_of_items')->nullable();
            // $table->foreign('order_id')->references('id')->on('delivery__infos')
            // ->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
}
