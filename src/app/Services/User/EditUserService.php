<?php

namespace App\Services\User;

use App\Dto\IDTO;
use App\Dto\User\EditUserDTO;
use App\Entities\User;
use App\Events\UserUpdated;
use App\Facades\Repository;
use App\Services\IService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

final class EditUserService implements IService
{
    /**
     * @param EditUserDTO|null $data
     * @throws Exception
     */
    public function execute(?IDTO $data): bool
    {
        try {
            Repository::users()->updateAuthenticated($data);

            event(new UserUpdated(auth()->user()));

            return true;
        } catch (Exception $e) {
            Log::error('Error update user id '. auth()->user()->id.' | Exception message: '.$e->getMessage());
            throw $e;
        }
    }
}
