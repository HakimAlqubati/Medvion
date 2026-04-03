<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('profession')->nullable();
            $table->string('workplace')->nullable();
            $table->text('notes')->nullable();
            
            $table->enum('status', ['pending', 'contacted', 'confirmed'])->default('pending');
            $table->text('admin_notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
