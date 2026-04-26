<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\Frontend\BlogService;

class Blog extends Component
{
    public $blogs;
    public $altBg;

    public function __construct(BlogService $blogService, $altBg = false)
    {
        $this->altBg = $altBg;
        
        $locale = app()->getLocale();
        $cacheKey = "components.blogs.latest.{$locale}.4";

        $this->blogs = Cache::remember($cacheKey, now()->addHours(2), function () use ($blogService) {
            return $blogService->getLatestBlogs(4);
        });
    }

    public function render(): View|Closure|string
    {
        return view('components.frontend.blog');
    }
}
