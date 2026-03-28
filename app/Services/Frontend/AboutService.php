<?php

namespace App\Services\Frontend;

use App\Models\About;
use Illuminate\Database\Eloquent\Collection;

class AboutService
{
    /**
     * Get the summary item for the homepage component
     *
     * @return About|null
     */
    public function getHomeSummary(): ?About
    {
        return About::where('is_active', true)
            ->where('section_key', 'home_summary')
            ->first();
    }

    /**
     * Get all page sections organized by their section keys.
     * Items like multiple 'values' will be grouped together.
     *
     * @return array
     */
    public function getPageContent(): array
    {
        $activeSections = About::where('is_active', true)
            ->whereIn('section_key', ['page_hero', 'definition', 'vision', 'mission', 'value'])
            ->orderBy('sort_order', 'asc')
            ->get();

        $pageData = [
            'page_hero' => null,
            'definition' => null,
            'vision' => null,
            'mission' => null,
            'values' => collect()
        ];

        foreach ($activeSections as $section) {
            if ($section->section_key === 'value') {
                $pageData['values']->push($section);
            } else {
                $pageData[$section->section_key] = $section;
            }
        }

        return $pageData;
    }
}
