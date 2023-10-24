<?php

namespace App\ThirdParty\Services\Soptify;

use App\ThirdParty\Auth\Spotify;

readonly class Albums
{
    public function __construct(private Spotify $spotify) {}

    public function getAlbums(String $id)
    {
        return $this->spotify->request()->get(config('services.spotify.base_url')."/v1/albums/{$id}")->json();
    }
}
