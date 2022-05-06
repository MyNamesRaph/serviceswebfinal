<?php

namespace App\Domain\Api\Service;

use App\Domain\Api\Repository\EditApiRepository;
use App\Exception\ValidationException;

use PDO;


final class EditApi {
    private $repository;

    public function __construct(EditApiRepository $repository, PDO $connection)
    {
        $this->repository = $repository;
        $this->connection = $connection;
    }

    public function editApi($id,$data) {
        $this->verifyData($data);
        $this->verifyId($id);
        return $this->repository->editApi($id,$data);
    }

    private function verifyData($data) {
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

    private function verifyId($id) {
        $sql = "SELECT id FROM apis where id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $result = $statement->fetchAll();

        if (sizeof($result) > 0) return true;
        throw new ValidationException('Invalid ID',['ID could not be found']);
    }

}