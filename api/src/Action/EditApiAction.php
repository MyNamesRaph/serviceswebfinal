<?php

namespace App\Action;

use App\Domain\Api\Service\EditApi;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Exception\ValidationException;

use function PHPUnit\Framework\isNull;

final class EditApiAction
{
    private $service;
    public function __construct(EditApi $service)
    {
        $this->service = $service;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        $data = (array)$request->getParsedBody();
        $id = $request->getAttribute('id');

        // Invoke the Domain with inputs and retain the result
        try {
            $result = $this->service->editApi($id,$data);
        }
        catch (ValidationException $e) {
            $response->getBody()->write((string)json_encode($e->getErrors(),JSON_UNESCAPED_SLASHES));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
        }
        
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(204);
    }
}
