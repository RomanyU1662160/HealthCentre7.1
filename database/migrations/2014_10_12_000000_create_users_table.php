<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('users')) {
      Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_number')->unique();
            $table->string('password');
            $table->string('title')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('house')->nullable();
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
