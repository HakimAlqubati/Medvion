<?php

namespace App\Services\Frontend;

use App\Models\HeroSlide;
use Illuminate\Support\Facades\Cache;

class HeroSlideService
{
    /**
     * Get active hero slides sorted by order securely via caching.
     */
    public static function getSlides()
    {

        return Cache::remember('frontend.hero_slides', now()->addHours(24), function () {
            return HeroSlide::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->get();
        });
    }

    /**
     * Clear cached slides. Trigger on model updates from the Admin logic.
     */
    public static function clearCache()
    {
        Cache::forget('frontend.hero_slides');
    }
}
