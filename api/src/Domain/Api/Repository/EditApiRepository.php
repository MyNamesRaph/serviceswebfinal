<?php

namespace App\Domain\Api\Repository;

use PDO;


class EditApiRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function editApi($id,$data) {
        $row = [
            'id' => $id,
            'name' => $data['name'],
            'url' => $data['url'],
            'description' => $data['description']
        ];

        $sql = "UPDATE apis SET 
                name = :name, 
                url = :url, 
                description = :description
                where id = :id";

        $this->connection->prepare($sql)->execute($row);
    }


}

