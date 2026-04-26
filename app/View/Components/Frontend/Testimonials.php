<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\Frontend\TestimonialService;

class Testimonials extends Component
{
    public $testimonials;
    public $altBg;

    public function __construct($altBg = false)
    {
        $this->altBg = $altBg;
        $this->testimonials = TestimonialService::getActiveTestimonials();
    }

    public function render(): View|Closure|string
    {
        return view('components.frontend.testimonials');
    }
}
