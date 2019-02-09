<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('drugs')) {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('minimum_age')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('drugs');
    }
}
