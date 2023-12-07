<?php

namespace App\Services\Lastfm\Endpoints\Track;

use App\Services\Lastfm\Endpoints\BaseEndpoint;
use App\Services\Lastfm\Entities\Track;
use Illuminate\Support\Collection;

class TrackEndpoint extends BaseEndpoint
{
    /**
     * Get the metadata for a track on Last.fm using the artist/track name or a musicbrainz id.
     * 
     * @param string|null $mbid The musicbrainz id for the track
     * @param string|null $track The track name (Required unless mbid)
     * @param string|null $artist The artist name (Required unless mbid)
     * @param string|null $username The username for the context of the request. If supplied, the user's playcount for this track and whether they have loved the track is included in the response.
     * @param boolean $autocorrect Transform misspelled artist and track names into correct artist and track names, returning the correct version instead. The corrected artist and track name will be returned in the response.
     * 
     * @return Track|null
     * @see https://www.last.fm/api/show/track.getInfo
     */
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

    /**
     * Get the similar tracks for this track on Last.fm, based on listening data.
     * 
     * @param string|null $track The track name (Required unless mbid)
     * @param string|null $artist The artist name (Required unless mbid)
     * @param string|null $mbid The musicbrainz id for the track
     * @param boolean $autocorrect Transform misspelled artist and track names into correct artist and track names, returning the correct version instead. The corrected artist and track name will be returned in the response.
     * @param int $limit Maximum number of similar tracks to return (Optional)
     * 
     * @return Collection
     * @see https://www.last.fm/api/show/track.getSimilar
     */
    public function getSimilar(?string $track = null, ?string $artist = null, ?string $mbid = null, bool $autocorrect = false, int $limit = 5): Collection
    {
        $this->service->setUrlParameters([
            'method'      => 'track.getSimilar',
            'track'       => $track,
            'artist'      => $artist,
            'mbid'        => $mbid,
            'autocorrect' => $autocorrect,
            'limit'       => $limit,
        ]);

        return $this->transform($this->service->api->get('/', $this->service->url_parameters)->json()['similartracks']['track'], Track::class);
    }

    /**
     * Search for a track by track name. Returns track matches sorted by relevance.
     * 
     * @param string $track The track name
     * @param string|null $artist Narrow your search by specifying an artist.
     * @param int $limit The number of results to fetch per page. Defaults to 30. (Optional)
     * @param int|null $page The page number to fetch. Defaults to first page. (Optional)
     * 
     * @return Collection
     * @see https://www.last.fm/api/show/track.search
     */
    public function search(string $track, string $artist = null, int $limit = 30, ?int $page = null): Collection
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