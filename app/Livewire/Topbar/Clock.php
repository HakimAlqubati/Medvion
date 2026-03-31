<?php

namespace App\Livewire\Topbar;

use Livewire\Component;

class Clock extends Component
{
    public function render()
    {
        return view('livewire.topbar.clock', [
            'time' => now()->format('h:i A') // أمثلة: 02:30 PM, 10:15 AM
        ]);
    }

    public function refresh()
    {
        // This is called by wire:poll.60000ms="refresh" to update the component
    }
}
