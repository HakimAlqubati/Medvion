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
        Schema::create('academic_headers', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('academic_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_id')->constrained('academic_headers')->cascadeOnDelete();
            $table->json('name');
            $table->string('image')->nullable();
            $table->integer('courses_count')->default(0);
            $table->integer('students_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_experts');
        Schema::dropIfExists('academic_headers');
    }
};
