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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
      
            $table->string('company_name');
            $table->string('job_title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->boolean('is_current')->default(false);
            $table->date('end_date')->nullable(); // can be null if still working
            $table->timestamps();

             // Foreign key if related to users
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
