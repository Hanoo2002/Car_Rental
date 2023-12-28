<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('cars', function (Blueprint $table) {
        $table->id('car_id');
        $table->unsignedSmallInteger('year');
        $table->string('model');
        $table->string('color');
        $table->string('office_id');
        $table->timestamps();

        // Define the foreign key constraint
        $table->foreign('office_id')->references('office_id')->on('offices')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
