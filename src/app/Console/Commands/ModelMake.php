<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;

class ModelMake extends ModelMakeCommand
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\\Entities';
    }
}
