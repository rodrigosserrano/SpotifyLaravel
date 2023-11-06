<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class DtoInvalidDataException extends Exception
{
    /**
     * @var mixed|null
     */
    private ?String $dtoInfoError;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null, string $dtoInfoError = null)
    {
        parent::__construct($message, $code, $previous);
        $this->dtoInfoError = $dtoInfoError;
    }

    public function context(): array
    {
        return [
            'message' => 'Invalid data in DTO',
        ];
    }

    public function getDtoInfo(): ?String
    {
        return $this->dtoInfoError;
    }
}
