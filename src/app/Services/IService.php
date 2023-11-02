<?php

namespace App\Services;

use App\Dto\IDTO;

interface IService
{
    public function execute(?IDTO $data);
}
