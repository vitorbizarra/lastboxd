<?php

namespace App\Services\Lastfm\Endpoints\Track;

use App\Services\Lastfm\Endpoints\BaseEndpoint;
use App\Services\Lastfm\Entities\Track;
use Illuminate\Support\Collection;

class TrackEndpoint extends BaseEndpoint
{

    public function getInfo(?string $mbid = null, ?string $track = null, ?string $artist = null, ?string $username = null, bool $autocorrect = false): ?Track
    {
        $this->service->setUrlParameters([
            'method'      => 'track.getInfo',
            'mbid'        => $mbid,
            'track'       => $track,
            'artist'      => $artist,
            'username'    => $username,
            'autocorrect' => $autocorrect,
        ]);
        return new Track($this->service->api->get('/', $this->service->url_parameters)->json()['track']);
    }

    public function search(string $track, int $limit = 30, ?int $page = null, string $artist = null): Collection
    {
        $this->service->setUrlParameters([
            'method' => 'track.search',
            'track'  => $track,
            'limit'  => $limit,
            'page'   => $page,
            'artist' => $artist
        ]);

        return $this->transform($this->service->api->get('/', $this->service->url_parameters)->json()['results']['trackmatches']['track'], Track::class);
    }
}