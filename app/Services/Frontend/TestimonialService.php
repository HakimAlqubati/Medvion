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
        return collect($testimonialsArray)->map(fn($item) => (object) $item);
    }
}