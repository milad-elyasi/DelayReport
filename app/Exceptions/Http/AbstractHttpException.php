<?php

namespace App\Exceptions\Http;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

abstract class AbstractHttpException extends Exception
{
    private int $statusCode;

    public function __construct(
        int $statusCode = Response::HTTP_BAD_REQUEST,
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
