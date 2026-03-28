<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use App\Services\Frontend\AboutService;

class About extends Component
{
    /**
     * @var \App\Models\About|null
     */
    public $summary;

    /**
     * @var bool
     */
    public $altBg;

    /**
     * Create a new component instance.
     *
     * @param AboutService $aboutService
     * @param bool $altBg
     * @return void
     */
    public function __construct(AboutService $aboutService, $altBg = false)
    {
        $this->summary = $aboutService->getHomeSummary();
        $this->altBg = $altBg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.about');
    }
}
