<?php

namespace App\Livewire\Components\Search;

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
        $results = Spotify::searchTracks($this->term, limit: 50)->get();
        $this->tracks = collect(data_get($results, 'tracks'));
    }

    public function placeholder()
    {
        return <<<'html'
            <div role="status" class="flex w-full justify-center  py-8 md:py-16">
                <i class="bi bi-music-note-beamed dark:text-white motion-safe:animate-bounce mx-1 text-4xl" style="animation-delay: 0.1s"></i>
                <i class="bi bi-music-note-beamed dark:text-white motion-safe:animate-bounce mx-1 text-4xl" style="animation-delay: 0.2s"></i>
                <i class="bi bi-music-note-beamed dark:text-white motion-safe:animate-bounce mx-1 text-4xl" style="animation-delay: 0.3s"></i>
                <span class="sr-only">Loading...</span>
            </div>
        html;
    }
}
