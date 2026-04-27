<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\Frontend\BlogService;
use Carbon\Carbon; // تأكد من استدعاء الكلاس

class Blog extends Component
{
    public $blogs;
    public $altBg;

    public function __construct(BlogService $blogService, $altBg = false)
    {
        $this->altBg = $altBg;
        
        $locale = app()->getLocale();
        $cacheKey = "components.blogs.latest.{$locale}.4";

        // 1. جلب البيانات كمصفوفة لتخزينها بأمان في الكاش
        $blogsArray = Cache::remember($cacheKey, now()->addHours(2), function () use ($blogService) {
            // نقوم بتحويل الـ Collection الراجعة من السيرفس إلى مصفوفة
            return $blogService->getLatestBlogs(4)->toArray();
        });

        // 2. تحويل المصفوفة إلى كائنات وإعادة بناء حقل التاريخ
        $this->blogs = collect($blogsArray)->map(function ($item) {
            $blog = (object) $item;
            
            // إعادة بناء كائن Carbon لتجنب خطأ ->format() في الـ Blade
            if (!empty($blog->published_at)) {
                $blog->published_at = Carbon::parse($blog->published_at);
            }
            
            return $blog;
        });
    }

    public function render(): View|Closure|string
    {
        return view('components.frontend.blog');
    }
}