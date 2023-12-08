<?php

namespace App\Services\Lastfm\Entities;

use Livewire\Wireable;

class Track implements Wireable
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

    public array|null $image;

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
        $this->image = data_get($data, 'image');
        $this->toptags = data_get($data, 'toptags');
        $this->wiki = data_get($data, 'wiki');
    }

    public function toLivewire()
    {
        return [
            'name'       => $this->name,
            'mbid'       => $this->mbid,
            'url'        => $this->url,
            'duration'   => $this->duration,
            'streamable' => $this->streamable,
            'listeners'  => $this->listeners,
            'playcount'  => $this->playcount,
            'artist'     => $this->artist,
            'album'      => $this->album,
            'image'      => $this->image,
            'toptags'    => $this->toptags,
            'wiki'       => $this->wiki,
        ];
    }

    public static function fromLivewire($value)
    {
        $name = $value['name'];
        $mbid = $value['mbid'];
        $url = $value['url'];
        $duration = $value['duration'];
        $streamable = $value['streamable'];
        $listeners = $value['listeners'];
        $playcount = $value['playcount'];
        $artist = $value['artist'];
        $album = $value['album'];
        $image = $value['image'];
        $toptags = $value['toptags'];
        $wiki = $value['wiki'];

        return new static($name, $mbid, $url, $duration, $streamable, $listeners, $playcount, $artist, $album, $image, $toptags, $wiki);
    }
}