<?php

namespace App\Domain\Api\Repository;

use PDO;


class AddApiRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function addApi($data) {
        $row = [
            'name' => $data['name'],
            'url' => $data['url'],
            'description' => $data['description']
        ];

        $sql = "INSERT INTO apis SET 
                name=:name, 
                url=:url, 
                description=:description
                ;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }


}

