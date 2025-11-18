<?php

namespace App\Models;

use App\Tools\Database;
use PDO;

class Year
{
    public $id = 0;
    public $record = '';
    public $resolution = '';
    public $blocked = '';

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from ano where idano = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = new Year();
        $model->id = $row['idano'];
        $model->record = $row['ficha'];
        $model->resolution = $row['resolucao'];
        $model->blocked = $row['bloqueado'];

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from ano;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = new Year();
            $model->id = $row['idano'];
            $model->record = $row['ficha'];
            $model->resolution = $row['resolucao'];
            $model->blocked = $row['bloqueado'];
            $array[] = $model;
        }

        return $array;
    }

    public function create() 
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert
        into ano(ficha,resolucao,bloqueado)
        values(:ficha,:resolucao,:bloqueado);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ficha', $this->record);
        $stmt->bindParam(':resolucao', $this->resolution);
        $stmt->bindParam(':bloqueado', $this->blocked);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update ano
        set ficha = :ficha,resolucao = :resolucao,bloqueado = :bloqueado
        where idano = :idano;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ficha', $this->record);
        $stmt->bindParam(':resolucao', $this->resolution);
        $stmt->bindParam(':bloqueado', $this->blocked);
        $stmt->bindParam(':idano', $this->id);

        return $stmt->execute();
    }

    public function delete() 
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "delete from ano where idano = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->id);

        return $stmt->execute();
    }
}