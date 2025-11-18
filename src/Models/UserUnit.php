<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class UserUnit
{
    public $id = 0;
    public $login = '';

    public static function fromRow($row)
    {
        $model = new UserUnit();
        $model->id = $row['idunidade'];
        $model->login = $row['login'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from usuario_unidade where idunidade = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = UserUnit::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from usuario_unidade;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = UserUnit::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into usuario_unidade
        values (:idunidade,:login);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idunidade', $this->id);
        $stmt->bindParam(':login', $this->login);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from unidade where idunidade = :idunidade and login = :login;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idunidade', $this->id);
        $stmt->bindParam(':login', $this->login);

        return $stmt->execute();
    }
}