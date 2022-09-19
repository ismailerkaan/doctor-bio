<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_details', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_adress')->nullable();
            $table->string('about')->nullable();
            $table->string('description')->nullable();
            $table->string('avarage_price')->nullable();
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
        Schema::dropIfExists('doctor_details');
    }
};
