<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\Frontend\AcademicExpertService;

class AcademicExperts extends Component
{
    public $section;
    public $altBg;

    public function __construct($altBg = false)
    {
        $this->altBg = $altBg;
        $this->section = AcademicExpertService::getActiveAcademicSection();
    }

    public function render(): View|Closure|string
    {
        return view('components.frontend.academic-experts');
    }
}
