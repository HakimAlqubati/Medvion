<?php

namespace App\Services\Frontend;

use App\Enums\BlogStatus;
use App\Models\Blog;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapService
{
    /**
     * Build the Sitemap object containing all platform URLs.
     */
    public static function build(): Sitemap
    {
        $baseUrl = rtrim(config('seo.canonical_domain', 'https://medvion.org'), '/');
        $sitemap = Sitemap::create();

        // 1. Core Public Static Pages
        $pages = [
            [
                'path'     => '/',
                'priority' => 1.0,
                'freq'     => Url::CHANGE_FREQUENCY_DAILY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/about',
                'priority' => 0.8,
                'freq'     => Url::CHANGE_FREQUENCY_MONTHLY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/contact',
                'priority' => 0.7,
                'freq'     => Url::CHANGE_FREQUENCY_MONTHLY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/expert-board',
                'priority' => 0.8,
                'freq'     => Url::CHANGE_FREQUENCY_WEEKLY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/blogs',
                'priority' => 0.9,
                'freq'     => Url::CHANGE_FREQUENCY_DAILY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/privacy-policy',
                'priority' => 0.3,
                'freq'     => Url::CHANGE_FREQUENCY_YEARLY,
                'lastmod'  => Carbon::now(),
            ],
            [
                'path'     => '/terms-conditions',
                'priority' => 0.3,
                'freq'     => Url::CHANGE_FREQUENCY_YEARLY,
                'lastmod'  => Carbon::now(),
            ],
        ];

        foreach ($pages as $p) {
            $sitemap->add(
                Url::create("{$baseUrl}{$p['path']}")
                    ->setLastModificationDate($p['lastmod'])
                    ->setChangeFrequency($p['freq'])
                    ->setPriority($p['priority'])
            );
        }

        // 2. Published Blog Posts
        $publishedBlogs = Blog::where('status', BlogStatus::PUBLISHED)->get();

        foreach ($publishedBlogs as $blog) {
            $lastmod = $blog->updated_at ?? $blog->published_at ?? Carbon::now();
            $blogUrl = Url::create("{$baseUrl}/blogs/{$blog->slug}")
                ->setLastModificationDate($lastmod)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8);

            if (!empty($blog->main_image)) {
                $imageUrl = filter_var($blog->main_image, FILTER_VALIDATE_URL)
                    ? $blog->main_image
                    : "{$baseUrl}/storage/{$blog->main_image}";

                $title = is_array($blog->title)
                    ? ($blog->title['ar'] ?? $blog->title['en'] ?? '')
                    : (string) $blog->title;

                $blogUrl->addImage($imageUrl, (string) $title);
            }

            $sitemap->add($blogUrl);
        }

        return $sitemap;
    }

    /**
     * Generate and write the sitemap to public/sitemap.xml
     */
    public static function generateToFile(): string
    {
        $filePath = public_path('sitemap.xml');
        self::build()->writeToFile($filePath);
        return $filePath;
    }
}
