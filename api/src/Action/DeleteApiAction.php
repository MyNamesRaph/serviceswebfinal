<?php

namespace App\Action;

use App\Domain\Api\Service\DeleteApi;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Exception\ValidationException;

final class DeleteApiAction
{
    private $service;
    public function __construct(DeleteApi $service)
    {
        $this->service = $service;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {
        $id = $request->getAttribute('id',0);
        $token = explode(' ', $request->getHeaderLine('Authorization'))[1] ?? '';

        try {
            $result = $this->service->deleteApi($id,$token);
        }
        catch (ValidationException $e) {
            $response->getBody()->write((string)json_encode($e->getErrors,JSON_UNESCAPED_SLASHES));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(401);
        }

        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus($result ? 204 : 404);
    }
}
