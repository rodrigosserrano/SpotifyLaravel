<?php

namespace App\Services\Auth;

use App\Dto\IDTO;
use App\Models\User\LoginSocialite\CreateWithSocialite;
use App\Models\User\LoginSocialite\GetWithSocialite;
use App\Models\User\LoginSocialite\User;
use App\Services\IService;
use Exception;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteService implements IService
{
    public function execute(?IDTO $data = null): bool
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
            $userContext = new User();

            try {
                $userContext->setStrategy(new GetWithSocialite());
                $userContext->login($userGoogle);
            } catch (Exception $e) {
                $userContext->setStrategy(new CreateWithSocialite());
                $userContext->login($userGoogle);
            }
            return true;
        } catch (Exception $e) {
            Log::error('Error authenticating with Google Socialite: ' . $e->getMessage());
            throw $e;
        }
    }
}
