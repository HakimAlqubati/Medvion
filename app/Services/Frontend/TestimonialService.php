<?php

namespace App\Services\Frontend;

use App\Models\Testimonial;
use App\Enums\TestimonialStatus;
use Illuminate\Support\Facades\Cache;

class TestimonialService
{
    /**
     * Get active testimonials for the landing page.
     */
    public static function getActiveTestimonials()
    {
        $locale = app()->getLocale();
        $cacheKey = "testimonials.active.{$locale}";

        // 1. جلب وتخزين البيانات في الكاش كمصفوفة (Array) آمنة وخفيفة
        $testimonialsArray = Cache::remember($cacheKey, now()->addHours(2), function () {
            return Testimonial::where('status', TestimonialStatus::ACTIVE)
                ->latest()
                // حددنا فقط الحقول المستخدمة في ملف Blade لتقليل حجم الكاش لأقصى درجة
                ->get(['id', 'rating', 'content', 'avatar_image', 'client_name', 'role'])
                ->toArray(); 
        });

        // 2. تحويل المصفوفة فور خروجها من الكاش إلى Collection of stdClass Objects
        // هذا السطر يخدع ملف Blade ليجعله يعتقد أنه يتعامل مع كائنات عادية
        return collect($testimonialsArray)->map(function ($item) {
            $item = (object) $item;

            // التحقق من وجود الصورة في المجلد، وإذا لم تكن موجودة نستخدم الصورة الافتراضية
            if ($item->avatar_image && file_exists(public_path('storage/' . $item->avatar_image))) {
                $item->avatar_image = 'storage/' . $item->avatar_image;
            } else {
                $item->avatar_image = 'assets/images/avatar.webp';
            }

            return $item;
        });
    }
}