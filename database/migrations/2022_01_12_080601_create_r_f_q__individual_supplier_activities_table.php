<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRFQIndividualSupplierActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_f_q__individual_supplier_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfq_no')->constrained();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->string('rfq_status')->nullable();
            $table->date('rfq_status_updated_at')->nullable();

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
        Schema::dropIfExists('r_f_q__individual_supplier_activities');
    }
}
