<?php

namespace App\Services\Frontend;

use App\Models\Faq;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class FaqService
{
    /**
     * Get active FAQs ordered by sort_order.
     *
     * نُخزّن البيانات كـ array خام لتجنب مشاكل serialize/unserialize
     * مع Eloquent Models في الـ file/redis cache driver،
     * ثم نُعيد بناءها بـ hydrate() عند الاسترجاع.
     *
     * @return Collection
     */
    public function getActiveFaqs(): Collection
    {
        $rows = Cache::remember('faqs.active', now()->addHours(6), function () {
            return Faq::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->limit(6)
                ->get()
                ->map->getAttributes() // raw DB values (JSON strings), بدون تطبيق الـ casts
                ->values()
                ->all();
        });

        // hydrate يستلم الـ raw attributes فتعمل الـ casts بشكل صحيح عند الوصول
        return Faq::hydrate($rows);
    }
}

