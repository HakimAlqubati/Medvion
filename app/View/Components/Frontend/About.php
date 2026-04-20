<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\Frontend\AboutService;

class About extends Component
{
    public $summary;
    public $altBg;

    public function __construct(AboutService $aboutService, $altBg = false, $summary = null)
    {
        // Data injected or fetched from service cleanly
        $this->summary = $summary ?? $aboutService->getHomeSummary();
        $this->altBg = $altBg;
    }

    public function render()
    {
        // Html Fragment Caching Architecture
        $locale = app()->getLocale();
        $altBgState = $this->altBg ? 'alt_bg' : 'normal_bg';
        $version = 'v1.0'; 
        
        $cacheKey = "components.about.{$locale}.{$altBgState}.{$version}";

        return Cache::remember($cacheKey, now()->addHours(6), function () {
            // No need to pass variables down explicitly if we use simple array, but it's cleaner
            return view('components.frontend.about', [
                'summary' => $this->summary,
                'altBg'   => $this->altBg,
            ])->render();
        });
    }
}
