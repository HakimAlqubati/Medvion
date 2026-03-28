<?php

namespace App\Services\Frontend;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class FaqService
{
    /**
     * Get active FAQs ordered by sort_order.
     *
     * @return Collection
     */
    public function getActiveFaqs(): Collection
    {
        return Faq::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
