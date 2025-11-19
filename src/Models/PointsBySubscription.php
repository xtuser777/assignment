<?php

namespace App\Models;

use PDO;

class PointsBySubscription extends Model
{
    public $idano = 0;
    public $idinscricao = 0;
    public $ordem = 0;
    public $descricao = '';
    public $pontos = 0.0;

    public static function fromRow($row)
    {
        $model = new PointsBySubscription();
        $model->idano = $row['idano'];
        $model->idinscricao = $row['idinscricao'];
        $model->ordem = $row['ordem'];
        $model->descricao = $row['descricao'];
        $model->pontos = $row['pontos'];

        return $model;
    }

    public function findOne($idano, $idinscricao, $idprofessor)
    {
        $stmt = $this->selectOneStatement('v_pontos_por_inscricao', 
        ['idano' => $idano, 'idinscricao' => $idinscricao, 'idprofessor' => $idprofessor]);
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = PointsBySubscription::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('v_pontos_por_inscricao', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = PointsBySubscription::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }
}