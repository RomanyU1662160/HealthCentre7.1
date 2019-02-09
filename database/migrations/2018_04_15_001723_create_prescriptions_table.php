<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('prescriptions')) {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id');
            $table->boolean('renewal')->nullable();
            $table->foreign('appointment_id')->refernces('id')->on('appointments')->onDelete('cascade');
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
        Schema::dropIfExists('prescriptions');
    }
}
