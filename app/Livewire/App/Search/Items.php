<?php

namespace App\Livewire\App\Search;

use App\Services\Spotify\Spotify;
use Illuminate\Support\Collection;
use Livewire\Component;

class Items extends Component
{
    public string $term;

    public Collection $albums;

    public Collection $artists;

    public Collection $tracks;

    public function mount(string $term)
    {
        $this->term = $term;
        $this->loadItems();
    }

    public function loadItems()
    {
        $results = Spotify::searchItems($this->term, limit: 9)->get();

        $this->albums = collect(data_get($results, 'albums'));
        $this->artists = collect(data_get($results, 'artists'));
        $this->tracks = collect(data_get($results, 'tracks'));
    }
}
