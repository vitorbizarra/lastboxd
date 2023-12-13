<?php

namespace App\Services\Spotify;

use App\Services\Spotify\Endpoints\Auth\HasAuth;
use App\Services\Spotify\Endpoints\Search\HasSearch;
use App\Services\Spotify\Endpoints\Tracks\HasTracks;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SpotifyService
{
    use HasAuth;
    use HasTracks;
    use HasSearch;

    public static PendingRequest $api;

    public static Response $response;

    protected static string $endpoint;

    public static function getApi()
    {
        $token = self::auth()->getAccessToken();

        return Http::baseUrl(getenv('SPOTIFY_ENDPOINT'))
            ->withHeader('Authorization', "Bearer {$token}");
    }

    public function get()
    {
        return self::$response->json();
    }
}