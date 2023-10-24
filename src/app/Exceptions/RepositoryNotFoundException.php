<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class RepositoryNotFoundException extends Exception
{
    /**
     * @var mixed|null
     */
    private ?String $className;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null, $className = null)
    {
        parent::__construct($message, $code, $previous);
        $this->className = $className;
    }

    public function context(): array
    {
        return [
            'message' => 'Repository not found',
            'repository_name' => $this?->className,
        ];
    }

    public function getClassName(): ?String
    {
        return $this->className;
    }
}
