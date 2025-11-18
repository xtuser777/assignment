<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class CivilStatus
{
    public $id = 0;
    public $name = '';

    public static function fromRow($row)
    {
        $model = new CivilStatus();
        $model->id = $row['idestado_civil'];
        $model->name = $row['nome'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from estado_civil where idestado_civil = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = CivilStatus::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from estado_civil;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = CivilStatus::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into estado_civil (nome)
        values (:nome);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update estado_civil 
        set nome = :nome
        where idestado_civil = :idestado_civil;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':idestado_civil', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from estado_civil where idestado_civil = :idestado_civil;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idestado_civil', $this->id);

        return $stmt->execute();
    }
}