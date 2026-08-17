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

        $rows = Cache::remember($cacheKey, now()->addHours(2), function () use ($limit) {
            return Blog::where('status', BlogStatus::PUBLISHED)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->take($limit)
                ->get()
                ->map->getAttributes()
                ->values()
                ->all();
        });

        $blogs = Blog::hydrate($rows);

        return $blogs->map(fn($blog) => $this->prepareBlogImage($blog));
    }

    /**
     * Get paginated published blogs for the index page.
     */
    public function getPaginatedBlogs($perPage = 9)
    {
        $blogs = Blog::where('status', BlogStatus::PUBLISHED)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);

        $blogs->getCollection()->transform(fn($blog) => $this->prepareBlogImage($blog));

        return $blogs;
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

        return $this->prepareBlogImage($blog);
    }

    /**
     * Prepare blog image path with fallback.
     */
    protected function prepareBlogImage($blog)
    {
        if ($blog->main_image && file_exists(public_path('storage/' . $blog->main_image))) {
            $blog->main_image = 'storage/' . $blog->main_image;
        } else {
            $blog->main_image = 'assets/images/blog-placeholder.webp';
        }
        return $blog;
    }

    /**
     * Clear all cached data and component fragments for blogs.
     */
    public static function clearCache(): void
    {
        $locales = ['ar', 'en'];
        $limits = [3, 4, 6, 8, 9, 10];

        foreach ($locales as $locale) {
            foreach ($limits as $limit) {
                Cache::forget("blogs.latest.{$locale}.{$limit}");
                Cache::forget("components.blogs.latest.{$locale}.{$limit}");
            }
            Cache::forget("components.blogs.latest.{$locale}.4");
        }
    }
}
