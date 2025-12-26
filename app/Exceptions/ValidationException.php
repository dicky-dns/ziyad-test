<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    public string $errorKey;

    public function __construct(string $errorKey)
    {
        parent::__construct($errorKey);
        $this->errorKey = $errorKey;
    }
}
