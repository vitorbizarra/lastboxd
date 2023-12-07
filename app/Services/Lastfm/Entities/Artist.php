<?php

namespace App\Services\Lastfm\Entities;

class Artist
{
    public string $name;

    public string $mbid;

    public string $url;

    public array|null $image;

    public bool|null $streamable;

    public bool|null $ontour;

    public array|null $stats;

    public array|null $similar;

    public array|null $tags;

    public array|null $bio;

    public function __construct(array $data)
    {
        $this->name       = data_get($data, 'name');
        $this->mbid       = data_get($data, 'mbid');
        $this->url        = data_get($data, 'url');
        $this->image      = data_get($data, 'image');
        $this->streamable = data_get($data, 'streamable');
        $this->ontour     = data_get($data, 'ontour');
        $this->stats      = data_get($data, 'stats');
        $this->similar    = data_get($data, 'similar');
        $this->tags       = data_get($data, 'tags');
        $this->bio        = data_get($data, 'bio');
    }
}