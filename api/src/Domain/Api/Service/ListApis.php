<?php

namespace App\Domain\Api\Service;

use App\Domain\Api\Repository\ListApisRepository;
use App\Exception\ValidationException;


final class ListApis {
    private $repository;

    public function __construct(ListApisRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listApis() {
        return $this->repository->listApis();
    }

}