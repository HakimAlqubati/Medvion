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
        return Course::with('category')
            ->where('is_active', true)
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get paginated active courses with their categories.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllCourses(int $perPage = 9): LengthAwarePaginator
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
