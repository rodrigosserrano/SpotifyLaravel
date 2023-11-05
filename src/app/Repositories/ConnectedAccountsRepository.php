<?php

namespace App\Repositories;

use App\Entities\ConnectedAccount;
use App\Enums\ProviderSocialiteEnum;

final class ConnectedAccountsRepository
{
    public function create(string $providerId, ProviderSocialiteEnum $providerName): ConnectedAccount
    {
        return ConnectedAccount::create([
            'provider_id' => $providerId,
            'provider' => $providerName->value,
        ]);
    }
}
