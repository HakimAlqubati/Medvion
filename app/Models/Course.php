<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    // السماح بإدخال جميع الحقول ما عدا الـ ID
    protected $guarded = ['id'];

    // تحويل البيانات تلقائياً بين قاعدة البيانات والـ Blade
    protected $casts = [
        'objectives' => 'array',
        'target_audience' => 'array',
        'content_modules' => 'array',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * العلاقات (Relationships)
     */

    // المستخدم الذي قام بإنشاء الدورة
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // المستخدم الذي قام بآخر تعديل على الدورة
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    /**
     * الفئة التي تنتمي إليها الدورة
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * أتمتة حقول التتبع (Booted Method)
     */
    protected static function booted()
    {
        // عند إنشاء دورة جديدة
        static::creating(function ($course) {
            if (Auth::check()) {
                $course->created_by = Auth::id();
                $course->updated_by = Auth::id();
            }
        });

        // عند تعديل الدورة
        static::updating(function ($course) {
            if (Auth::check()) {
                $course->updated_by = Auth::id();
            }
        });
    }
}
