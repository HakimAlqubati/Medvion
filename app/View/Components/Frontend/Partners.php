<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\PartnerCategory;
use App\Models\Partner;

class Partners extends Component
{
    public $partnerStats;
    public $partners;

    public function __construct()
    {
        $locale   = app()->getLocale();
        $dataKey  = "frontend.partners.data.{$locale}.v1";

        $data = Cache::remember($dataKey, now()->addHours(24), function () {
            return [
                'stats'    => PartnerCategory::whereNotNull('stat_value')->where('is_active', true)->get(),
                'partners' => Partner::with('category')->where('is_active', true)->get(),
            ];
        });

        $this->partnerStats = $data['stats'];
        $this->partners     = $data['partners'];
    }

    public function render()
    {
        // Html Fragment Caching Architecture
        $locale  = app()->getLocale();
        $version = 'v1.0';

        $cacheKey = "components.partners.{$locale}.{$version}";

        return Cache::remember($cacheKey, now()->addHours(24), function () {
            return view('components.frontend.partners', [
                'partnerStats' => $this->partnerStats,
                'partners'     => $this->partners,
            ])->render();
        });
    }
}
