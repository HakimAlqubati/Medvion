<?php

namespace App\Services\Frontend;

use App\Models\Blog;
use App\Enums\BlogStatus;
use Illuminate\Support\Facades\Cache;

class BlogService
{
    /**
     * Get the latest published blogs for the home page.
     */
    public function getLatestBlogs($limit = 4)
    {
        $locale = app()->getLocale();
        $cacheKey = "blogs.latest.{$locale}.{$limit}";

        return Cache::remember($cacheKey, now()->addHours(2), function () use ($limit) {
            return Blog::where('status', BlogStatus::PUBLISHED)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->take($limit)
                ->get();
        });
    }

    /**
     * Get paginated published blogs for the index page.
     */
    public function getPaginatedBlogs($perPage = 9)
    {
        return Blog::where('status', BlogStatus::PUBLISHED)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get a single blog post by slug and increment read count.
     */
    public function getBlogBySlug($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', BlogStatus::PUBLISHED)
            ->firstOrFail();

        // Increment read count
        $blog->increment('read_count');

        return $blog;
    }
}
