<?php

namespace App\Services\Frontend;

use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class FeatureService
{
    /**
     * Get active features for the landing page.
     * Caches the results to prevent repeated database queries.
     * Returns Collection of Feature models.
     */
    public static function getFeatures()
    {
        $rows = Cache::remember('frontend.features.active', now()->addHours(6), function () {
            return Feature::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->limit(3)
                ->get()
                ->map->getAttributes() // raw DB values, بدون تطبيق الـ casts للهروب من الـ serialization
                ->values()
                ->all();
        });

        // إعادة بناء الـ Eloquent Collection من الـ array المُخزَّن
        return Feature::hydrate($rows);
    }

    /**
     * Clear the features cache.
     * Call this when creating/updating/deleting features from the Admin Panel.
     */
    public static function clearCache()
    {
        Cache::forget('frontend.features.active');
    }
}
