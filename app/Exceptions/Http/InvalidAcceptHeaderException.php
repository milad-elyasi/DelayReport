<?php

namespace App\Exceptions\Http;

use Symfony\Component\HttpFoundation\Response;

class InvalidAcceptHeaderException extends AbstractHttpException
{
    public function __construct()
    {
        parent::__construct(
            Response::HTTP_NOT_ACCEPTABLE,
            'This application only supports json responses.'
        );
    }
}
