<?php

namespace App\Livewire\App\Search;

use Livewire\Component;

class Tracks extends Component
{
    public string $term;

    public function mount(string $term)
    {
        $this->term = $term;
    }
}

