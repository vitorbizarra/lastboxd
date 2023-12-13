<?php

namespace App\Services\Spotify\Endpoints\Search;

use App\Services\Spotify\Spotify;

/**
 * Get Spotify catalog information about albums, artists, playlists, 
 * tracks, shows, episodes or audiobooks that match a keyword string. 
 * Audiobooks are only available within the US, UK, Canada, Ireland, 
 * New Zealand and Australia markets.
 * 
 * @see https://developer.spotify.com/documentation/web-api/reference/search
 */
trait HasSearch
{
    public static function searchItems(string $query, ?int $limit = 10, ?int $offset = 0): Spotify
    {
        self::$endpoint = '/search';

        self::$response = self::getApi()
            ->get(static::$endpoint, [
                'type'   => 'artist,album,track',
                'q'      => $query,
                'limit'  => $limit,
                'offset' => $offset,
            ]);

        return new Spotify;
    }

    public static function searchTracks(string $query, ?int $limit = 10, ?int $offset = 0): Spotify
    {
        self::$endpoint = '/search';

        self::$response = self::getApi()
            ->get(static::$endpoint, [
                'type'   => 'track',
                'q'      => $query,
                'limit'  => $limit,
                'offset' => $offset,
            ]);

        return new Spotify;
    }

    public static function searchAlbums(string $query, ?int $limit = 10, ?int $offset = 0): Spotify
    {
        self::$endpoint = '/search';

        self::$response = self::getApi()
            ->get(static::$endpoint, [
                'type'   => 'album',
                'q'      => $query,
                'limit'  => $limit,
                'offset' => $offset,
            ]);

        return new Spotify;
    }

    public static function searchArtists(string $query, ?int $limit = 10, ?int $offset = 0): Spotify
    {
        self::$endpoint = '/search';

        self::$response = self::getApi()
            ->get(static::$endpoint, [
                'type'   => 'artist',
                'q'      => $query,
                'limit'  => $limit,
                'offset' => $offset,
            ]);

        return new Spotify;
    }
}