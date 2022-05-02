<?php

namespace App\Action;

use App\Domain\Api\Service\ListApis;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ListApisAction
{
    private $service;
    public function __construct(ListApis $service)
    {
        $this->service = $service;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Invoke the Domain with inputs and retain the result
        $result = $this->service->listApis();

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result,JSON_UNESCAPED_SLASHES));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
