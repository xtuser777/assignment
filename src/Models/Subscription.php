<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Subscription
{
    public $id = 0;
    public $year_id = 0;
    public $teatcher_id = 0;
    public $preference_id = 0;

    public static function fromRow($row)
    {
        $model = new Subscription();
        $model->id = $row['idinscricao'];
        $model->year_id = $row['idano'];
        $model->teatcher_id = $row['idprofessor'];
        $model->preference_id = $row['idpreferencia'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from inscricao where idinscricao = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Subscription::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from inscricao;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Subscription::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into inscricao (idano,idprofessor,idpreferencia)
        values (:idano,:idprofessor,:idpreferencia);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idprofessor', $this->teatcher_id);
        $stmt->bindParam(':idpreferencia', $this->preference_id);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update inscricao 
        set idano = :idano,idprofessor = :idprofessor,idpreferencia = :idpreferencia
        where idinscricao = :idinscricao;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':idprofessor', $this->teatcher_id);
        $stmt->bindParam(':idpreferencia', $this->preference_id);
        $stmt->bindParam(':idinscricao', $this->id);

        return $stmt->execute();
    }

    public function dalete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from inscricao where idinscricao = :idinscricao;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idinscricao', $this->id);

        return $stmt->execute();
    }
}