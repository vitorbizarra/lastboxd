<?php

namespace App\Livewire\App\Search;

use App\Services\Spotify\Spotify;
use Illuminate\Support\Collection;
use Livewire\Component;

class Tracks extends Component
{
    public string $term;

    public Collection $tracks;

    public function mount(string $term)
    {
        $this->term = $term;
        $this->loadTracks();
    }

    public function loadTracks()
    {
        $results = Spotify::searchTracks($this->term, limit: 10)->get();
        $this->tracks = collect(data_get($results, 'tracks'));
    }
}

