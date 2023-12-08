<?php

namespace App\Services\Spotify\Endpoints;

trait HasAuth
{
    public function __construct()
    {
        $this->auth()->getAccessToken();
    }

    public function auth()
    {
        return new Auth(getenv('SPOTIFY_CLIENT_ID'), getenv('SPOTIFY_CLIENT_SECRET'));
    }
}