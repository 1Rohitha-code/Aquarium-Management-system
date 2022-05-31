<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationPermRequestedQtyTblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_perm_requested_qty_tbles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id')->constrained();
            $table->unsignedBigInteger('rfq_ref_id')->nullable();
            $table->unsignedBigInteger('supplier_user_id')->nullable();
            $table->integer("requested_qty")->nullable();
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
        Schema::dropIfExists('quotation_perm_requested_qty_tbles');
    }
}
