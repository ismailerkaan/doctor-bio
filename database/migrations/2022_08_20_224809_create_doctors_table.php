<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('department_id')->nullable();
            $table->string('password');
            $table->timestamp('licance_start')->nullable();
            $table->timestamp('licance_end')->nullable();
            $table->string('city_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable();
            $table->integer('best')->default(0)->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
