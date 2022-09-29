<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModel extends ModelMakeCommand
{
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Models';
    }
}
