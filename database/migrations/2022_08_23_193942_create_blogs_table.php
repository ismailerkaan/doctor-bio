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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->string('header')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('like')->default(0)->nullable();
            $table->integer('dislike')->default(0)->nullable();
            $table->integer('status')->default(2)->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
