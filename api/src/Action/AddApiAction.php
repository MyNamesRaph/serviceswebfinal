<?php

namespace App\Action;

use App\Domain\Api\Service\AddApi;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Exception\ValidationException;

final class AddApiAction
{
    private $service;
    public function __construct(AddApi $service)
    {
        $this->service = $service;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        try {
            $result = $this->service->addApi($data);
        }
        catch (ValidationException $e) {
            $response->getBody()->write((string)json_encode($e->getErrors(),JSON_UNESCAPED_SLASHES));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
        }
        
        $response->getBody()->write((string)json_encode($result,JSON_UNESCAPED_SLASHES));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
