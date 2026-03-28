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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Identifies what this row represents (e.g. 'home_summary', 'page_hero', 'vision', 'value')
            $table->string('section_key')->index();

            // Translatable JSON columns
            $table->json('title');
            $table->json('content');

            // Visual elements
            $table->string('icon')->nullable(); // Can store SVG paths or icon classes
            $table->string('image')->nullable();
            $table->string('color')->nullable(); // e.g. 'primary' or 'secondary'

            // Metadata
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
