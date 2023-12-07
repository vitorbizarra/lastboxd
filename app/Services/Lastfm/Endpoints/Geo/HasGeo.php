<?php

namespace App\Services\Lastfm\Endpoints\Geo;

trait HasGeo
{
    public function geo()
    {
        return new GeoEndpoint();
    }
}