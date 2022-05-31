<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationItemsPermTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('quotation_items_perm_tbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id')->constrained();
            $table->unsignedBigInteger('rfq_ref_id')->nullable();
            $table->unsignedBigInteger('supplier_user_id')->nullable();
            $table->string("supplier_stock_prod_name")->nullable();
            $table->integer("supplier_stock_prod_qty")->nullable();
            $table->decimal("unit_price")->nullable();
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
        Schema::dropIfExists('quotation_items_perm_tbls');
    }
}
