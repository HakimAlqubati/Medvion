<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @var CourseService
     */
    protected $courseService;

    /**
     * CourseController constructor.
     *
     * @param CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of courses.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = $this->courseService->getAllCourses();

        return view('frontend.courses.index', compact('courses'));
    }

    /**
     * Display the specified course.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $course = $this->courseService->getCourseBySlug($slug);

        return view('frontend.courses.show', compact('course'));
    }
}
