<?php

namespace App\Services\Spotify\Endpoints\Tracks;

use App\Services\Spotify\Spotify;

trait HasTracks
{
    protected static const ENDPOINT = '/tracks';

    /**
     * Get Spotify catalog information for a single track identified by its unique Spotify ID.
     * 
     * @param string $track_id The Spotify ID for the track. Example: 11dFghVXANMlKmJXsNCbNl
     * 
     * @return Spotify
     * @see https://developer.spotify.com/documentation/web-api/reference/get-track
     */
    public static function track(string $track_id): Spotify
    {
        self::$response = self::getApi()
            ->get(static::ENDPOINT . '/' . $track_id);

        return new Spotify;
    }

    /**
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     * 
     * @param string[] $tracks_ids A array of the Spotify IDs. For example: ['4iV5W9uYEdYUVa79Axb7Rh', '1301WleyT98MSxVHPZCA6M']. Maximum: 50 IDs.
     * 
     * @return Spotify
     * @see https://developer.spotify.com/documentation/web-api/reference/get-several-tracks
     */
    public static function tracks(string ...$tracks_ids): Spotify
    {
        self::$response = self::getApi()
            ->get(static::ENDPOINT, [
                'ids' => collect($tracks_ids)->implode(',')
            ]);

        return new Spotify;
    }
}