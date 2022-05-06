<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Middleware\BasicAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    
    $app->get('/apis', \App\Action\ListApisAction::class);
    $app->post('/apis', \App\Action\AddApiAction::class);
    $app->delete('/apis/{id}', \App\Action\DeleteApiAction::class);
    $app->put('/apis/{id}', \App\Action\EditApiAction::class);

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

};

