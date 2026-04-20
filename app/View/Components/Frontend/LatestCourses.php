<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\Frontend\CourseService;

class LatestCourses extends Component
{
    public $altBg;
    public $courses;
    public $isGuest;

    public function __construct(CourseService $courseService, $altBg = false, $courses = null)
    {
        $this->altBg = $altBg;
        $this->isGuest = auth()->guest();
        
        // منع استعلام قاعدة البيانات للضيف بشكل حاسم
        if ($this->isGuest) {
            $this->courses = collect();
        } else {
            // استخدام البيانات الممررة إن وُجدت، أو استدعاء الخدمة هنا بعيداً عن الـ View
            $this->courses = $courses ?? $courseService->getLatestCourses(3);
        }
    }

    public function render()
    {
        // بناء مفتاح كاش احترافي ودقيق (Scalable Cache Key)
        $locale = app()->getLocale();
        $authState = $this->isGuest ? 'guest' : 'auth';
        $altBgState = $this->altBg ? 'alt_bg' : 'normal_bg';
        $version = 'v1.0'; // سهولة تدمير الكاش عالمياً للكل
        
        $cacheKey = "components.latest_courses.{$locale}.{$authState}.{$altBgState}.{$version}";

        // Fragment Caching HTML Output: 
        // نقوم بإرجاع قيمة نصّية HTML وليس الكائن للإستفادة من 0 Render Time
        return Cache::remember($cacheKey, now()->addHours(6), function () {
            return view('components.frontend.latest-courses', [
                'courses' => $this->courses,
                'altBg'   => $this->altBg,
                'isGuest' => $this->isGuest,
            ])->render();
        });
    }
}
