<?php

namespace App\Livewire\App;

use App\Services\Lastfm\Entities\Track;
use App\Services\Lastfm\LastfmService;
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

        dump($this->tracks);
    }

    public function loadTracks()
    {
        $lastfm = new LastfmService();

        $lastfm
            ->track()
            ->search($this->term, page: $this->page)
            ->each(fn(Track $track) => $this->tracks->push($track));
    }
}
