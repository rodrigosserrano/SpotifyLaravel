<?php

namespace App\Listeners;

use App\Enums\UserStatusEnum;
use App\Events\UserEvent;
use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateUserStatus
{

    /**
     * Handle the event.
     */
    public function handle(UserEvent $event): void
    {
        Log::info('Changing user status');

        if ($event->user?->status?->id === UserStatusEnum::Pending->value || is_null($event->user?->status?->id)) {
            if (!empty($event->user->cpf) && !empty($event->user->birth_date)) {
                $event->user->user_status_id = UserStatusEnum::Complete->value;
                $event->user->save();
            }
        }
    }
}
