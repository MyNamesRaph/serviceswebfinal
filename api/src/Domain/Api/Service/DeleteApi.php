<?php

namespace App\Domain\Api\Service;

use App\Domain\Api\Repository\DeleteApiRepository;
use App\Exception\ValidationException;

use PDO;

final class DeleteApi {
    private $repository;

    public function __construct(DeleteApiRepository $repository, PDO $connection)
    {
        $this->repository = $repository;
        $this->connection = $connection;
    }

    public function deleteApi(int $id,string $token) : Bool {
        $user = explode(":",base64_decode($token));
        if($this->verifyUser($user)) {
            return $this->repository->deleteApi($id);
        }
    }

    public function verifyUser(array $user) : Bool {
        $sql = "SELECT * FROM users where username = :username AND password = :password";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(":username",$user[0]);
        $statement->bindValue(":password",$user[1]);
        $statement->execute();
        $result = $statement->fetchAll();

        if (sizeof($result) > 0) return true;
        throw new ValidationException('User was not authentified',['Invalid user credentials']);
    }

}