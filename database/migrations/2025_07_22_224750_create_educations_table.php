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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();

            $table->string('university');
            $table->string('degree'); // e.g., Bachelor's, Master's
            $table->string('field_of_study')->nullable(); // e.g., Computer Science
            $table->date('start_date');
            $table->date('end_date')->nullable(); // if still studying
            $table->string('grade')->nullable(); // GPA or percentage
            $table->text('description')->nullable(); // optional notes
            $table->timestamps();

            // Foreign key if related to users
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
