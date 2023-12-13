<?php

namespace App\Livewire\App;

use App\Services\Spotify\Spotify;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchResults extends Component
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
        $results = Spotify::searchItems($this->term, limit: 5)->get();

        dump($results);
        $this->albums = collect(data_get($results, 'albums'));
        $this->artists = collect(data_get($results, 'artists'));
        $this->tracks = collect(data_get($results, 'tracks'));
    }
}
