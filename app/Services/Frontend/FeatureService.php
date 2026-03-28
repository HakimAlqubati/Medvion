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
        return Feature::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();
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
