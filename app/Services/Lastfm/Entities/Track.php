<?php

namespace App\Services\Lastfm\Entities;

class Track
{
    public string|null $name;

    public string|null $mbid;

    public string|null $url;

    public int|null $duration;

    public array|string|null $streamable;

    public int|null $listeners;

    public int|null $playcount;

    public Artist|string|null $artist;

    public array|null $album;

    public array|null $toptags;

    public array|null $wiki;

    public function __construct(array $data)
    {
        $this->name = data_get($data, 'name');
        $this->mbid = data_get($data, 'mbid');
        $this->url = data_get($data, 'url');
        $this->duration = data_get($data, 'duration');
        $this->streamable = data_get($data, 'streamable');
        $this->listeners = data_get($data, 'listeners');
        $this->playcount = data_get($data, 'playcount');
        $this->artist = is_array(data_get($data, 'artist')) ? new Artist(data_get($data, 'artist')) : data_get($data, 'artist');
        $this->album = data_get($data, 'album');
        $this->toptags = data_get($data, 'toptags');
        $this->wiki = data_get($data, 'wiki');
    }
}