<?php

namespace App\Exception;

class ValidationException extends AppPublicException
{
    protected iterable $errors = [];

    protected $object;

    public function __construct($errors, $object = null)
    {
        parent::__construct("Validation failed");

        $this->errors = $errors;
        $this->object = $object;
    }

    public function getErrors(): iterable
    {
        return $this->errors;
    }
}
