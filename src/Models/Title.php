<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

class Title
{
    public $id = 0;
    public $year_id = 0;
    public $description = '';
    public $alias = '';
    public $weight = 0;
    public $max = 0;
    public $order = 0;
    public $type = '';
    public $active = 'S';

    public static function fromRow($row)
    {
        $model = new Title();
        $model->id = $row['idtitulo'];
        $model->year_id = $row['idano'];
        $model->description = $row['descricao'];
        $model->alias = $row['sigla'];
        $model->weight = $row['peso'];
        $model->max = $row['maximo'];
        $model->order = $row['ordem'];
        $model->type = $row['tipo'];
        $model->active = $row['ativo'];

        return $model;
    }

    public function findOne($id)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from titulo where idtitulo = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Title::fromRow($row);

        return $model;
    }

    public function findMany()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "select * from titulo;";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute() === false) {
            return [];
        }
        $rows = $stmt->fetchAll();
        $array = [];
        foreach ($rows as $row) {
            $model = Title::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        insert 
        into titulo (idano,descricao,sigla,peso,maximo,ordem,tipo,ativo)
        values (:idano,:descricao,:sigla,:peso,:maximo,:ordem,:tipo,:ativo);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':descricao', $this->description);
        $stmt->bindParam(':sigla', $this->alias);
        $stmt->bindParam(':peso', $this->weight);
        $stmt->bindParam(':maximo', $this->max);
        $stmt->bindParam(':ordem', $this->order);
        $stmt->bindParam(':tipo', $this->type);
        $stmt->bindParam(':ativo', $this->active);

        return $stmt->execute();
    }

    public function update()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        update titulo 
        set 
            idano = :idano, 
            descricao = :descricao, 
            sigla = :sigla, 
            peso = :peso, 
            maximo = :maximo, 
            ordem = :ordem, 
            tipo = :tipo, 
            ativo = :ativo
        where idtitulo = :idtitulo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idano', $this->year_id);
        $stmt->bindParam(':descricao', $this->description);
        $stmt->bindParam(':sigla', $this->alias);
        $stmt->bindParam(':peso', $this->weight);
        $stmt->bindParam(':maximo', $this->max);
        $stmt->bindParam(':ordem', $this->order);
        $stmt->bindParam(':tipo', $this->type);
        $stmt->bindParam(':ativo', $this->active);
        $stmt->bindParam(':idtitulo', $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "
        delete from titulo where idtitulo = :idtitulo;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idtitulo', $this->id);

        return $stmt->execute();
    }
}