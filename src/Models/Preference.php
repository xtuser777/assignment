<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Preference
{
    public $id = 0;
    public $name = '';

    public static function fromRow($row)
    {
        $model = new Preference();
        $model->id = $row['idpreferencia'];
        $model->name = $row['nome'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from preferencia where idpreferencia = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Preference::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from preferencia;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Preference::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into preferencia (nome)
        values (:nome);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update preferencia 
        set nome = :nome
        where idpreferencia = :idpreferencia;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':idpreferencia', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from preferencia where idpreferencia = :idpreferencia;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idpreferencia', $this->id);

        return $stmt->execute();
    }
}