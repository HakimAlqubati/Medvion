<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations; // استدعاء حزمة الترجمة

class Category extends Model
{
    use HasFactory, SoftDeletes, HasTranslations; // تفعيل الترجمة

    protected $guarded = ['id'];

    // تحديد الحقول التي تدعم الترجمة (JSON في الداتا بيز)
    public $translatable = ['name'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * العلاقات الهرمية (Hierarchical Relationships)
     */

    // الفئة الأب (الرئيسية)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // الفئات الأبناء (الفرعية)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * العلاقة مع الدورات
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * أتمتة حقول التتبع
     */
    protected static function booted()
    {
        static::creating(function ($category) {
            if (Auth::check()) {
                $category->created_by = Auth::id();
                $category->updated_by = Auth::id();
            }
        });

        static::updating(function ($category) {
            if (Auth::check()) {
                $category->updated_by = Auth::id();
            }
        });
    }
}
