<?php

namespace App\Services\Spotify\Endpoints\Tracks;

use App\Services\Spotify\Spotify;

class TracksEndpoint
{
    public static function track()
    {
        dd(Spotify::getApi()->get('/track/11dFghVXANMlKmJXsNCbNl'));
    }
}