<?php

namespace App\Services\Frontend;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageService
{
    /**
     * Get an active page by its slug (e.g. 'privacy', 'terms').
     * Caches the query to prevent redundant database hits for static texts.
     *
     * @param string $slug
     * @return \App\Models\Page|null
     */
    public static function getPage(string $slug)
    {
        // Disable cache during development to prevent Incomplete_Class errors when tables don't exist
        if (\Illuminate\Support\Facades\App::environment('local')) {
            return Page::where('slug', $slug)
                ->where('is_active', true)
                ->first();
        }

        return Cache::remember("frontend.page.{$slug}", now()->addHours(24), function () use ($slug) {
            return Page::where('slug', $slug)
                ->where('is_active', true)
                ->first();
        });
    }

    /**
     * Clear the cache for a specific page slug.
     * Call this when a page is updated in the Admin panel.
     *
     * @param string|null $slug
     */
    public static function clearCache($slug = null)
    {
        if ($slug) {
            Cache::forget("frontend.page.{$slug}");
        } else {
            // Alternatively, clear known pages if slug isn't provided (or tag-based cache if using Redis/Memcached)
            Cache::forget('frontend.page.privacy');
            Cache::forget('frontend.page.terms');
        }
    }
}
