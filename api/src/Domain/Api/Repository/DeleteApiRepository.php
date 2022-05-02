<?php

namespace App\Domain\Api\Repository;

use PDO;


class DeleteApiRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function deleteApi(int $id) : Bool {
        $sql = "DELETE FROM apis WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        if ($statement->rowCount() > 0) return true;
        else return false;
    }


}

