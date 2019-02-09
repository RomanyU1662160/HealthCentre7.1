<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('patients')) {
        Schema::create('patients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('fname');
          $table->string('lname');
          $table->string('patient_number');
          $table->string('gender');
          $table->string('mobile');
          $table->string('email');
          $table->string('house');
          $table->string('address');
          $table->string('postcode');
          $table->date('dob');
          $table->string('avatar')->nullable();
          $table->integer('doctor_id')->unsigned()->index();
          $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
          $table->timestamps();
        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
