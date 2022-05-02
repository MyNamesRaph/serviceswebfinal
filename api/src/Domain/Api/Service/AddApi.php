<?php

namespace App\Domain\Api\Service;

use App\Domain\Api\Repository\AddApiRepository;
use App\Exception\ValidationException;


final class AddApi {
    private $repository;

    public function __construct(AddApiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addApi($data) {
        $this->verifyData($data);
        return $this->repository->addApi($data);
    }

    public function verifyData($data) {
        $errors = [];

        if (!isset($data['name']) || empty($data['name'])) {
            $errors['name'] = 'Name is required';
        }

        if (!isset($data['url']) || empty($data['url'])) {
            $errors['url'] = 'Url is required';
        }

        if (!isset($data['description']) || empty($data['description'])) {
            $errors['description'] = 'Description is required';
        }

        if (count($errors) > 0) {
            throw new ValidationException('Please check your input',$errors);
        }
    }

}