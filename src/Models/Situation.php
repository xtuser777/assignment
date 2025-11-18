<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Situation
{
    public $id = 0;
    public $name = '';

    public static function fromRow($row)
    {
        $model = new Situation();
        $model->id = $row['idsituacao'];
        $model->name = $row['nome'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from situacao where idsituacao = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Situation::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from situacao;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Situation::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into situacao (nome)
        values (:nome);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update situacao 
        set nome = :nome
        where idsituacao = :idsituacao;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':idsituacao', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from situacao where idsituacao = :idsituacao;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idsituacao', $this->id);

        return $stmt->execute();
    }
}