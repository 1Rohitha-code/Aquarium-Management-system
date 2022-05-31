<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationHandlingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_handling_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfq_ref_id')->nullable(); 
            $table->unsignedBigInteger('supplier_user_id')->nullable();
            $table->timestamp('rfq_response_expected_date');
            $table->date('rfq_date_of_delivered')->nullable();
            $table->date('quotation_valid_until')->nullable();
            $table->string('quotation_status')->nullable();
            $table->date('quot_status_updated_date')->nullable();
            $table->date('quotation_delivered_date')->nullable();
            $table->decimal('total_price')->nullable();
            $table->string('description')->nullable();
            $table->foreign('rfq_ref_id')->references('id')->on('r_f_q__handling_infos')
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
        Schema::dropIfExists('quotation_handling_infos');
    }
}
