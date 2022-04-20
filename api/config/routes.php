<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Middleware\BasicAuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    $app->post('/users', \App\Action\UserCreateAction::class);

    $app->get('/users', \App\Action\ListUsersAction::class);

    $app->get('/users/{id}', \App\Action\ListUserFromIDAction::class);

    $app->put('/users/{id}', \App\Action\ModifyUserFromIDAction::class);

    $app->delete('/users/{id}', \App\Action\DeleteUserFromIDAction::class);

    $app->get('/cle_api', \App\Action\CreateAPIKeyAction::class);

    $app->get('/livres', \App\Action\ListBooksAction::class);

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

};

