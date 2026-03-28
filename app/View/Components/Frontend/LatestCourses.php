<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use App\Services\Frontend\CourseService;

class LatestCourses extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $courses;

    /**
     * @var bool
     */
    public $altBg;

    /**
     * Create a new component instance.
     *
     * @param CourseService $courseService
     * @param bool $altBg
     * @return void
     */
    public function __construct(CourseService $courseService, $altBg = false)
    {
        $this->courses = $courseService->getLatestCourses(3);
        $this->altBg = $altBg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.latest-courses');
    }
}
