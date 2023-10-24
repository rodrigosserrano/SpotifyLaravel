<?php

namespace App\Repositories;


use App\Exceptions\RepositoryNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class LoadRepository
{
    /**
     * @throws Throwable
     * @throws RepositoryNotFoundException
     */
    public function __call(string $name, array $arguments)
    {
        try {
            if (!class_exists($className = "\\App\\Repositories\\" . ucfirst($name) . "Repository")) {
                throw new RepositoryNotFoundException(className: $className);
            }
            return app($className);
        } catch (Throwable $e) {
            Log::error("Repository {$e?->getClassName()} not found");
            throw $e;
        }
    }
}
