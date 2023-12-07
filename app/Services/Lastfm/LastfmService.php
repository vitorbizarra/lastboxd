<?php

namespace App\Services\Lastfm;

use App\Services\Lastfm\Endpoints\Geo\HasGeo;
use App\Services\Lastfm\Endpoints\Track\HasTrack;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LastfmService
{
    use HasTrack;
    use HasGeo;

    private string $endpoint;

    public array $url_parameters;

    public PendingRequest $api;

    public function __construct()
    {
        $this->endpoint = env('LASTFM_ENDPOINT');
        $this->url_parameters = ['api_key' => env('LASTFM_API_KEY'), 'format' => 'json'];
        $this->api = Http::baseUrl($this->endpoint)->withUrlParameters($this->url_parameters);
    }

    public function setUrlParameters(array $parameters)
    {
        $this->url_parameters = collect($parameters)->map(fn($value) => $value)->toArray();
        $this->url_parameters['api_key'] = env('LASTFM_API_KEY');
        $this->url_parameters['format'] = 'json';
    }
}