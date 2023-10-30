<?php

namespace App\Enums;

enum UserStatusEnum: Int
{
    case Complete = 1;
    case PendingCPF = 2;
    case PendingBirthDate = 3;
}
