<?php

namespace App\Services\Auth;

use App\Dto\IDto;
use App\Models\User\CreateWithSocialiteStrategy;
use App\Models\User\GetWithSocialiteStrategy;
use App\Models\User\UserContext;
use App\Services\IService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteService implements IService
{
    public function execute(?IDto $data = null): bool
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
            $userContext = new UserContext();

            $userContext->setStrategy(new GetWithSocialiteStrategy());
            $user = $userContext->executeStrategy($userGoogle);

            if (!$user) {
                $userContext->setStrategy(new CreateWithSocialiteStrategy());
                $user = $userContext->executeStrategy($userGoogle);
            }

            Auth::login($user);
            return true;
        } catch (Exception $e) {
            Log::error('Error authenticating with Google Socialite: ' . $e->getMessage());
            throw $e;
        }
    }
}
