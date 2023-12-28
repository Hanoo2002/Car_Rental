<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id');
            $table->string('status');
            $table->date('date');
            
            // Defining composite primary key using multiple columns
            $table->primary(['car_id', 'status', 'date']);
    
            // Foreign key constraint (assuming 'car_id' references the 'id' column in the 'cars' table)
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_statuses');
    }
};
