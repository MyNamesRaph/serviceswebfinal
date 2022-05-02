<?php

namespace App\Domain\Api\Repository;

use PDO;


class ListApisRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function listApis() {
        $sql = "SELECT * FROM apis";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


}

