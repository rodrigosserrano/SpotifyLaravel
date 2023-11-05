<?php

namespace App\Listeners;

use App\Enums\UserStatusEnum;
use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateUserStatus implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(UserUpdated $event): void
    {
        Log::info('Changing user status');

        if ($event->user->status->id === UserStatusEnum::Pending->value) {
            if (!empty($event->user->cpf) && !empty($event->user->birth_date)) {
                $event->user->user_status_id = UserStatusEnum::Complete->value;
                $event->user->save();
            }
        }
    }
}
