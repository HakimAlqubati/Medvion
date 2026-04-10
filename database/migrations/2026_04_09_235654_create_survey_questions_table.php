<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('surveys')->cascadeOnDelete();
            $table->string('key')->nullable(); // Unique key for logic identification (e.g., exp_years, has_content)
            $table->text('question_text');
            $table->string('type'); // text, textarea, select, multiselect, radio, file, email, phone
            $table->json('options')->nullable(); // For select, multiselect, radio options
            $table->boolean('is_required')->default(true);
            $table->integer('order')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_questions');
    }
};
