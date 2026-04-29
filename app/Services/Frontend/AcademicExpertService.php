<?php

namespace App\Services\Frontend;

use App\Models\AcademicHeader;
use Illuminate\Support\Facades\Cache;

class AcademicExpertService
{
    /**
     * Get the active academic section data including header and experts.
     */
    public static function getActiveAcademicSection()
    {
        $locale = app()->getLocale();
        $cacheKey = "academic.section.active.{$locale}";

        // Store data as array in cache for safety and speed
        $sectionArray = Cache::remember($cacheKey, now()->addHours(2), function () {
            $header = AcademicHeader::where('is_active', true)
                ->with(['experts' => function ($query) {
                    $query->select(['id', 'header_id', 'name', 'image', 'courses_count', 'students_count']);
                }])
                ->select(['id', 'title', 'description'])
                ->first();

            return $header ? $header->toArray() : null;
        });

        if (!$sectionArray) {
            return null;
        }

        // Convert array to stdClass objects after retrieving from cache
        $headerObj = (object) $sectionArray;
        $headerObj->experts = collect($sectionArray['experts'])->map(function ($item) {
            $expert = (object) $item;

            // Default image logic
            if ($expert->image && file_exists(public_path('storage/' . $expert->image))) {
                $expert->image = 'storage/' . $expert->image;
            } else {
                $expert->image = 'assets/images/avatar.webp';
            }

            return $expert;
        });

        return $headerObj;
    }
}
