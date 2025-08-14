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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title'); // Project name
            $table->string('slug')->unique()->nullable(); // SEO-friendly URL
            $table->text('description')->nullable();
            $table->string('technologies')->nullable(); // e.g., Laravel, Vue, MySQL
            $table->string('github_link')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable(); // If still in progress, leave null
            $table->string('status')->default('completed');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

       
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
