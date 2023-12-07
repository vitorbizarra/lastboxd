<?php

namespace App\Livewire\Components;

use App\Livewire\App\SearchTrackResults;
use App\Services\Lastfm\LastfmService;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SearchTrackForm extends Component
{
    #[Rule(['required', 'string'])]
    public ?string $term;

    public function search()
    {
        $this->validate();

        session()->flash('term', $this->term);

        $this->redirect(route('results', ['term' => $this->term]));
    }
}
