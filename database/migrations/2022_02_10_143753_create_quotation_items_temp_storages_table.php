<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationItemsTempStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_items_temp_storages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id')->constrained();
            $table->unsignedBigInteger('rfq_ref_id')->nullable();
            $table->unsignedBigInteger('supplier_stock_prod_id')->nullable();
            $table->string('supplier_stock_prod_name')->nullable();
            $table->decimal('unit_price')->nullable();
            $table->integer('supplier_stock_prod_qty')->nullable();
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
        Schema::dropIfExists('quotation_items_temp_storages');
    }
}
