<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\PartnerCategory;
use App\Models\Partner;
use Illuminate\Support\Facades\Cache;

class Partners extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Cache the entire partner data for 24 hours to ensure 0 performance impact
        // Cache is invalidated or updated when a partner is saved via admin panel
        $data = Cache::remember('frontend.partners.v2', 60 * 60 * 24, function () {
            return [
                'stats' => PartnerCategory::whereNotNull('stat_value')->where('is_active', true)->get(),
                'partners' => Partner::with('category')->where('is_active', true)->get(),
            ];
        });

        return view('components.frontend.partners', [
            'partnerStats' => $data['stats'],
            'partners' => $data['partners'],
        ]);
    }
}
