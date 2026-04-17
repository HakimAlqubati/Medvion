<?php

namespace App\Services\Frontend;

use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CourseService
{
    /**
     * Get the latest active courses with their categories.
     *
     * @param int $limit
     * @return Collection
     */
    public function getLatestCourses(int $limit = 3): Collection
    {
        $rows = \Illuminate\Support\Facades\Cache::remember('frontend.courses.latest.' . $limit, now()->addHours(6), function () use ($limit) {
            return Course::with('category')
                ->where('is_active', true)
                ->latest()
                ->take($limit)
                ->get()
                ->map(function ($course) {
                    // نأخذ الخصائص الأساسية كـ raw database strings
                    return [
                        'attributes' => $course->getAttributes(),
                        'category_attributes' => $course->category ? $course->category->getAttributes() : null,
                    ];
                })
                ->toArray();
        });

        // إعادة بناء موديلات الكورسات الرئيسية باستخدام الـ raw attributes
        $courses = Course::hydrate(array_column($rows, 'attributes'));

        // إعادة ربط الـ Relations (category) بدون N+1 queries
        foreach ($courses as $index => $course) {
            $catAttrs = $rows[$index]['category_attributes'];
            if ($catAttrs) {
                // نبني الموديل الخاص بالتصنيف ونربطه بالكورس
                $category = \App\Models\Category::hydrate([$catAttrs])->first();
                $course->setRelation('category', $category);
            }
        }

        return $courses;
    }

    /**
     * Get paginated active courses with their categories.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllCourses(int $perPage = 6): LengthAwarePaginator
    {
        return Course::with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Retrieve a specific active course by its slug.
     *
     * @param string $slug
     * @return Course
     */
    public function getCourseBySlug(string $slug): Course
    {
        return Course::with('category')
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
