<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Discipline
{
    public $id = 0;
    public $name = '';

    public static function fromRow($row)
    {
        $model = new Discipline();
        $model->id = $row['iddisciplina'];
        $model->name = $row['nome'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from disciplina where iddisciplina = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Discipline::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from disciplina;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Discipline::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into disciplina (nome)
        values (:nome);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update disciplina 
        set nome = :nome
        where iddisciplina = :iddisciplina;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $this->name);
        $stmt->bindParam(':iddisciplina', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from disciplina where iddisciplina = :iddisciplina;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':iddisciplina', $this->id);

        return $stmt->execute();
    }
}