<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRFQContentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_f_q__content_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfq_ref_id')->nullable();
            $table->string('product_ids')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('required_qty')->nullable();
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
        Schema::dropIfExists('r_f_q__content_infos');
    }
}
