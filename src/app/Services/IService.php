<?php

namespace App\Services;

use App\Dto\IDto;

interface IService
{
    public function execute(?IDto $data);
}
