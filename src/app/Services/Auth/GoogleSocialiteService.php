<?php

namespace App\Services\Auth;

use App\Dto\IDTO;
use App\Models\User\LoginSocialite\LoginSocialite;
use App\Services\IService;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

final class GoogleSocialiteService implements IService
{
    /**
     * @throws Exception
     */
    public function execute(?IDTO $data = null): bool
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
            LoginSocialite::execute($userGoogle);
            return true;
        } catch (Exception $e) {
            Log::error('Error authenticating with Google Socialite: ' . $e->getMessage());
            throw $e;
        }
    }
}
