<?php

namespace App\Livewire\App;

use Aerni\Spotify\Spotify;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchTrackResults extends Component
{
    public string $term;

    public int $page;

    public Collection $tracks;

    public function mount(string $term)
    {
        $this->term = $term;
        $this->page = 1;
        $this->tracks = collect([]);

        $this->loadTracks();
    }

    public function loadTracks()
    {
        
    }
}
