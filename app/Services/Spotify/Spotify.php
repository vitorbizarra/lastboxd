<?php

namespace App\Services\Spotify;

use App\Services\Spotify\Endpoints\Auth\HasAuth;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Spotify
{
    use HasAuth;

    public PendingRequest $api;

    public function __construct()
    {
        $this->auth()->getAccessToken();
        $this->api = Http::baseUrl(getenv('SPOTIFY_ENDPOINT'));
    }
}