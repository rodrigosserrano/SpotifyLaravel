<?php

namespace App\Services\User;

use App\Dto\IDTO;
use App\Dto\User\EditUserDTO;
use App\Entities\User;
use App\Events\UserUpdated;
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
            User::find(auth()->user()->id)->update([
                'cpf' => $data->cpf,
                'birth_date' => Carbon::make($data->birth_date),
            ]);

            event(new UserUpdated(User::find(auth()->user()->id)));

            return true;
        } catch (Exception $e) {
            Log::error('Error update user id '. auth()->user()->id.' | Exception message: '.$e->getMessage());
            throw $e;
        }
    }
}
