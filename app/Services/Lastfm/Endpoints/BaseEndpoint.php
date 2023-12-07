<?php

namespace App\Services\Lastfm\Endpoints;

use App\Services\Lastfm\LastFmService;
use Illuminate\Support\Collection;

abstract class BaseEndpoint
{
    protected LastFmService $service;

    public function __construct()
    {
        $this->service = new LastFmService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)->map(fn ($artist) => new $entity($artist));
    }
}