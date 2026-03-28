<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;
use App\Services\Frontend\FaqService;

class Faq extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $faqs;

    /**
     * @var bool
     */
    public $altBg;

    /**
     * Create a new component instance.
     *
     * @param FaqService $faqService
     * @param bool $altBg
     * @return void
     */
    public function __construct(FaqService $faqService, $altBg = false)
    {
        $this->faqs = $faqService->getActiveFaqs();
        $this->altBg = $altBg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.faq');
    }
}
