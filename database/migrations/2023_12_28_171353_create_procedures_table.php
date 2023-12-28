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
        Schema::create('procedures', function (Blueprint $table) {
            $table->id('procedure_id');
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('car_id');
            $table->date('date');
            $table->string('procedure');
    
            // Foreign key constraints
            $table->foreign('cust_id')->references('cust_id')->on('customers')->onDelete('cascade');
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
