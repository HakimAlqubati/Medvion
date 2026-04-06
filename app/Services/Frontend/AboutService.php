<?php

namespace App\Services\Frontend;

use App\Models\About;
use App\Models\Goal;
use App\Models\TargetAudience;
use App\Models\TeamMember;
use App\Models\Impact;
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

    /**
     * Get active goals
     * @return Collection
     */
    public function getGoals(): Collection
    {
        return Goal::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    }

    /**
     * Get active target audiences
     * @return Collection
     */
    public function getTargetAudiences(): Collection
    {
        return TargetAudience::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    }

    /**
     * Get active team members
     * @return Collection
     */
    public function getTeamMembers(): Collection
    {
        return TeamMember::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    }

    /**
     * Get active impacts
     * @return Collection
     */
    public function getImpacts(): Collection
    {
        return Impact::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    }
}
