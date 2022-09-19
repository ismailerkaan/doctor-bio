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
        Schema::create('doctor_work_hours', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->enum('day', ['1','2','3','4','5','6','7']);
            $table->time('hour_start')->default('08:30:00');
            $table->time('hour_end')->default('18:00:00');
            $table->enum('is_closed', ['0', '1'])->default('0');
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
        Schema::dropIfExists('doctor_work_hours');
    }
};
