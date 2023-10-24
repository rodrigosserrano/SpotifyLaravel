<?php

namespace App\ThirdParty\Auth;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Spotify
{
    /**
     * @throws RequestException
     */
    private function auth(): void
    {
        try {
            $accessToken = Http::asForm()->retry(env('RETRIES_REQUESTS'))->post(config('services.spotify.auth.url'), [
                'grant_type' => 'client_credentials',
                'client_id' => config('services.spotify.auth.client_id'),
                'client_secret' => config('services.spotify.auth.client_secret')
            ])->throw()?->json('access_token');
            Cache::add('spotify_access_token', $accessToken, 3600);
        } catch (RequestException $e) {
            Log::error("Error to authenticate with Spotify", [$e->getMessage()]);
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function request(): PendingRequest
    {
        if (!Cache::has('acceess_token')) {
            $this->auth();
        }

        return Http::withToken(Cache::get('spotify_access_token'))->retry(env('RETRIES_REQUESTS'));
    }
}
