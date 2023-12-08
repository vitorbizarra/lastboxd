<?php

namespace App\Services\Spotify\Endpoints\Tracks;

trait HasTracks
{
    public function tracks()
    {
        return new TracksEndpoint;
    }
}