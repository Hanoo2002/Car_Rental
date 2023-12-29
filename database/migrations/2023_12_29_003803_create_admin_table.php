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
        Schema::create('admins', function (Blueprint $table) {
            $table->string('ssn', 11)->primary();
            $table->string('fname');
            $table->string('lname');
            $table->string('office_id');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
    
            $table->foreign('office_id')->references('office_id')->on('offices')->onDelete('cascade');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
