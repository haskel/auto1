<?php

namespace App\Dto;

class ErrorResponse
{
    public string $message;
    public string $errorId = "";

    public function __construct(string $message, string $errorId = "")
    {
        $this->message = $message;
        $this->errorId = $errorId;
    }
}
