<?php

namespace App\Services\Spotify\Endpoints;

use App\Services\Spotify\Exceptions\SpotifyAuthException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class Auth
{
    private const SPOTIFY_API_TOKEN_URL = 'https://accounts.spotify.com/api/token';

    private string $clientId;

    private string $clientSecret;

    private Client $client;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->client = new Client;
    }

    /**
     * Generate the access token that will be used to make request to the Spotify API.
     *
     * @throws SpotifyAuthException
     */
    private function generateAccessToken(): void
    {
        try {
            $response = $this->client->post(self::SPOTIFY_API_TOKEN_URL, [
                'headers'     => [
                    'Content-Type'  => 'application/x-www-form-urlencoded',
                    'Accepts'       => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode("{$this->clientId}:{$this->clientSecret}"),
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);
        } catch (RequestException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody()->getContents());
            $status = $e->getCode();
            $message = $errorResponse->error;

            throw new SpotifyAuthException($message, $status, $errorResponse);
        }

        $body = json_decode((string) $response->getBody());

        Cache::remember('spotifyAccessToken', $body->expires_in, function () use ($body) {
            return $body->access_token;
        });
    }

    /**
     * Get the access token.
     *
     * @return string
     * @throws SpotifyAuthException
     */
    public function getAccessToken(): string
    {
        if (!Cache::has('spotifyAccessToken')) {
            $this->generateAccessToken();
        }

        return Cache::get('spotifyAccessToken');
    }
}
