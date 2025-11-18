<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Unit
{
    public $id = 0;
    public $name = '';

    public static function fromRow($row)
    {
        $model = new Unit();
        $model->id = $row['idunidade'];
        $model->name = $row['nome'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from unidade where idunidade = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Unit::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from unidade;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Unit::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into unidade (nome)
        values (:nome);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update unidade 
        set nome = :nome
        where idunidade = :idunidade;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':idunidade', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from unidade where idunidade = :idunidade;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idunidade', $this->id);

        return $stmt->execute();
    }
}