<?php

namespace App\Services\Spotify\Endpoints\Auth;

trait HasAuth
{
    public static function auth()
    {
        return new AuthEndpoint(getenv('SPOTIFY_CLIENT_ID'), getenv('SPOTIFY_CLIENT_SECRET'));
    }
}