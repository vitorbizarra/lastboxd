<?php

namespace App\Services\Lastfm\Endpoints\Geo;

use App\Services\Lastfm\Endpoints\BaseEndpoint;
use App\Services\Lastfm\Entities\Artist;
use App\Services\Lastfm\Entities\Track;
use Illuminate\Support\Collection;

class GeoEndpoint extends BaseEndpoint
{
    public function getTopArtists(string $country, int $limit = 10, int $page = 1): Collection
    {
        $this->service->setUrlParameters([
            'method'  => 'geo.gettopartists',
            'country' => $country,
            'limit'   => $limit,
            'page'    => $page
        ]);

        return $this->transform($this->service->api->get('/', $this->service->url_parameters)->json()['topartists']['artist'], Artist::class);
    }

    public function getTopTracks(string $country, int $limit = 10, int $page = 1)
    {
        $this->service->setUrlParameters([
            'method'  => 'geo.gettoptracks',
            'country' => $country,
            'limit'   => $limit,
            'page'    => $page
        ]);

        return $this->transform($this->service->api->get('/', $this->service->url_parameters)->json()['tracks']['track'], Track::class);
    }
}