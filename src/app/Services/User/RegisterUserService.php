<?php

namespace App\Services\User;

use App\Dto\IDTO;
use App\Dto\User\RegisterUserDTO;
use App\Entities\User;
use App\Enums\UserStatusEnum;
use App\Events\UserCreated;
use App\Facades\Repository;
use App\Services\IService;
use Exception;
use Illuminate\Support\Facades\Log;

final class RegisterUserService implements IService
{
    /**
     * @param ?RegisterUserDTO $data
     * @return User
     */
    public function execute(?IDTO $data): User
    {
        try {
            $user = Repository::users()->create($data);
            event(new UserCreated($user));
            return $user;
        } catch (Exception $e) {
            Log::error('Error registering user: ' . $e->getMessage());
            throw $e;
        }
    }
}
