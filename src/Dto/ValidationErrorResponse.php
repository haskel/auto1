<?php

namespace App\Dto;

class ValidationErrorResponse
{
    public string $message;

    /** @var ValidationError[] */
    public array $errors = [];

    public function __construct(string $message, array $errors)
    {
        $this->message = $message;
        $this->errors  = $errors;
    }
}
