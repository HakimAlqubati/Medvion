<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            // الحقل الهرمي (Nullable ليسمح بوجود فئات رئيسية بدون أب)
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();
            
            // البيانات الأساسية
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable(); // مفيد جداً لعرض الأيقونات الطبية في واجهة المستخدم
            $table->boolean('is_active')->default(true);
            
            // حقول التتبع
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};