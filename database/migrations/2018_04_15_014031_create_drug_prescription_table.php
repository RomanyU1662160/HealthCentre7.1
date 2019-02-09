<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugPrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('drug_prescription')) {
        Schema::create('drug_prescription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drug_id')->unsigned()->index();
            $table->integer('prescription_id')->unsigned()->index();
            $table->foreign('drug_id')->refernces('id')->on('drugs')->onDelete('cascade');
            $table->foreign('prescription_id')->refernces('id')->on('prescriptions')->onDelete('cascade');
            $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drug_prescription');
    }
}
