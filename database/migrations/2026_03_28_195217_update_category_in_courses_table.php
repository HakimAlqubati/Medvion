<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // حذف الحقل النصي الخاطئ
            $table->dropColumn('category_name');
            
            // إضافة حقل الربط مع جدول الفئات (بعد حقل video_url للترتيب)
            $table->foreignId('category_id')->nullable()->after('video_url')->constrained('categories')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // في حالة التراجع (Rollback)
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->string('category_name')->after('video_url')->nullable();
        });
    }
};