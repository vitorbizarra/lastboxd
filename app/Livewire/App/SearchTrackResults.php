<?php

namespace App\Livewire\App;

use Livewire\Component;

class SearchTrackResults extends Component
{
    public string $term;

    public function mount()
    {
        $this->term = session('term');
    }
}
