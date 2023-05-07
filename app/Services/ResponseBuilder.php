<?php

namespace App\Services;

use App\Contracts\Services\ResponseBuilder as Contract;
use Illuminate\Contracts\Routing\ResponseFactory as Response;

abstract class ResponseBuilder implements Contract
{
    protected Response $response;
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

}
