<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('appointments')) {

        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refrence');
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
            $table->boolean('patient_attend')->default(0);
            $table->boolean('doctor_attend')->default(0);
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->integer('doctor_id');
            $table->integer('patient_id');
            table->integer('prescription_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
