<?php

namespace App\Services\Lastfm\Entities;

class Tag
{
    public string $name;

    public string $url;

    public function __construct(array $data)
    {
        $this->name = data_get($data, 'name');
        $this->url = data_get($data, 'url');
    }
}