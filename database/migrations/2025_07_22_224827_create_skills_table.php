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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
     
            $table->string('name'); // e.g., "Laravel", "Teamwork"
            $table->string('level')->nullable(); // e.g., "Beginner", "Intermediate", "Advanced"
            $table->integer('proficiency')->nullable(); // e.g., 1–100 or a rating system
            $table->timestamps();

            // Foreign key to users table (optional)
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
