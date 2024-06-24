<?php

namespace Src\BoundedContext\Shared\Infrastructure\Exceptions;

class ModelNotDefinedException extends InvalidResponseException
{
    public function __construct()
    {
        parent::__construct('No model defined');
    }
}
