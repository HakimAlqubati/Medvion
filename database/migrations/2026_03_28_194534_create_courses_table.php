<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            
            // البيانات الأساسية
            $table->string('slug')->unique(); // الرابط الدائم
            $table->string('title'); 
            $table->text('brief'); // النبذة
            $table->json('objectives'); // الأهداف
            $table->json('target_audience'); // الفئة المستهدفة
            $table->json('content_modules'); // محتوى الدورة
            
            // الوسائط
            $table->string('image')->nullable(); 
            $table->string('video_url')->nullable(); 
            
            // التصنيف والتفاصيل الأكاديمية
            $table->string('category_name'); // مؤقتاً لحين بناء جدول التصنيفات
            $table->enum('level', ['beginner', 'inter', 'advanced'])->default('beginner');
            $table->integer('hours')->default(0);
            $table->integer('students_count')->default(0);
            
            // الأمور المالية والحالة
            $table->decimal('price', 8, 2)->default(0.00);
            $table->boolean('is_active')->default(true);
            
            // التتبع والتدقيق (Audit Trail)
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            
            // أوقات الإنشاء والتعديل والحذف الوهمي
            $table->timestamps();
            $table->softDeletes(); // يضيف عمود deleted_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};