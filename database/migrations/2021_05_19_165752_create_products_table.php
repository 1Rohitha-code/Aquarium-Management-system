<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('product_name')->nullable();
            $table->mediumText('image')->nullable();
            $table->decimal('unit_price')->nullable();
            $table->decimal('price_increasing')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('availability')->nullable();
            $table->string('supplied_by')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('products');
    }
}
