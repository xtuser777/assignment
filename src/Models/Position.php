<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Position
{
    public $id = 0;
    public $name = '';
    public $active = 'S';

    public static function fromRow($row) {
        $position = new Position();
        $position->id = $row['idcargo'];
        $position->name = $row['nome'];
        $position->active = $row ['ativo'];

        return $position;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from cargo where idcargo = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Position::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from cargo;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Position::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into cargo (nome,ativo)
        values (:nome,:ativo);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':ativo', $this->active);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update cargo 
        set nome = :nome, ativo = :ativo
        where idcargo = :idcargo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':ativo', $this->active);
        $stmt->bindParam(':idcargo', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from cargo where idcargo = :idcargo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idcargo', $this->id);

        return $stmt->execute();
    }
}