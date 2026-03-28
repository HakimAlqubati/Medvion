<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations; // استدعاء حزمة الترجمة

class Course extends Model
{
    use HasFactory, SoftDeletes, HasTranslations; // تفعيل الترجمة

    protected $guarded = ['id'];

    // تحديد الحقول التي تدعم الترجمة
    public $translatable = ['title', 'brief'];

    // تحويل البيانات تلقائياً بين قاعدة البيانات والـ Blade
    // ملاحظة: لا نضع title و brief هنا لأن حزمة Spatie تتولى أمرها
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

    // الفئة التي تنتمي إليها الدورة
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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
     * أتمتة حقول التتبع (Booted Method)
     */
    protected static function booted()
    {
        static::creating(function ($course) {
            if (Auth::check()) {
                $course->created_by = Auth::id();
                $course->updated_by = Auth::id();
            }
        });

        static::updating(function ($course) {
            if (Auth::check()) {
                $course->updated_by = Auth::id();
            }
        });
    }
}
