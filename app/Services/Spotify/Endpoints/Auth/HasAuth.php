<?php

namespace App\Services\Spotify\Endpoints\Auth;

trait HasAuth
{
    public static function auth()
    {
        return new Auth(getenv('SPOTIFY_CLIENT_ID'), getenv('SPOTIFY_CLIENT_SECRET'));
    }
}