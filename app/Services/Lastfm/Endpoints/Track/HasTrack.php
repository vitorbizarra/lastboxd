<?php

namespace App\Services\Lastfm\Endpoints\Track;

trait HasTrack
{
    public function track(): TrackEndpoint
    {
        return new TrackEndpoint();
    }
}