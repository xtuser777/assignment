<?php

namespace App\Models;

use PDO;

class Classification extends Model
{
    public $idano = 0;
    public $idinscricao = 0;
    public $idprofessor = 0;
    public $nome = '';
    public $idsituacao = 0;
    public $situacao = '';
    public $idcargo = 0;
    public $cargo = '';
    public $idunidade = 0;
    public $unidade = '';
    public $iddisciplina = 0;
    public $disciplina = '';
    public $telefone = '';
    public $celular = '';
    public $remocao = '';
    public $adido = '';
    public $readaptado = '';
    public $saladeleitura = '';
    public $informatica = '';
    public $cargasuplementar = '';
    public $especialidade = '';
    public $reforco = '';
    public $educacaoambiental = '';
    public $t1 = 0.0;
    public $t2 = 0.0;
    public $t3 = 0.0;
    public $t4 = 0.0;
    public $t5 = 0.0;
    public $t6 = 0.0;
    public $t7 = 0.0;
    public $t8 = 0.0;
    public $t9 = 0.0;
    public $t10 = 0.0;
    public $t11 = 0.0;
    public $t12 = 0.0;
    public $t13 = 0.0;
    public $t14 = 0.0;
    public $t15 = 0.0;
    public $t16 = 0.0;
    public $t17 = 0.0;
    public $t18 = 0.0;
    public $t19 = 0.0;
    public $t20 = 0.0;
    public $t21 = 0.0;
    public $t22 = 0.0;
    public $total = 0.0;

    public static function fromRow($row)
    {
        $model = new Classification();
        $model->idano = $row['idano'];
        $model->idinscricao = $row['idinscricao'];
        $model->idprofessor = $row['idprofessor'];
        $model->nome = $row['nome'];
        $model->idsituacao = $row['idsituacao'];
        $model->situacao = $row['situacao'];
        $model->idcargo = $row['idcargo'];
        $model->cargo = $row['cargo'];
        $model->idunidade = $row['idunidade'];
        $model->unidade = $row['unidade'];
        $model->iddisciplina = $row['iddisciplina'];
        $model->disciplina = $row['disciplina'];
        $model->telefone = $row['telefone'];
        $model->celular = $row['celular'];
        $model->remocao = $row['remocao'];
        $model->adido = $row['adido'];
        $model->readaptado = $row['readaptado'];
        $model->saladeleitura = $row['saladeleitura'];
        $model->informatica = $row['informatica'];
        $model->cargasuplementar = $row['cargasuplementar'];
        $model->especialidade = $row['especialidade'];
        $model->reforco = $row['reforco'];
        $model->educacaoambiental = $row['educacaoambiental'];
        $model->t1 = $row['t1'];
        $model->t2 = $row['t2'];
        $model->t3 = $row['t3'];
        $model->t4 = $row['t4'];
        $model->t5 = $row['t5'];
        $model->t6 = $row['t6'];
        $model->t7 = $row['t7'];
        $model->t8 = $row['t8'];
        $model->t9 = $row['t9'];
        $model->t10 = $row['t10'];
        $model->t11 = $row['t11'];
        $model->t12 = $row['t12'];
        $model->t13 = $row['t13'];
        $model->t14 = $row['t14'];
        $model->t15 = $row['t15'];
        $model->t16 = $row['t16'];
        $model->t17 = $row['t17'];
        $model->t18 = $row['t18'];
        $model->t19 = $row['t19'];
        $model->t20 = $row['t20'];
        $model->t21 = $row['t21'];
        $model->t22 = $row['t22'];
        $model->total = $row['total'];

        return $model;
    }

    public function findOne($idano, $idinscricao, $idprofessor)
    {
        $stmt = $this->selectOneStatement('v_classificacao', 
        ['idano' => $idano, 'idinscricao' => $idinscricao, 'idprofessor' => $idprofessor]);
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Group::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('v_classificacao', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = Group::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }
}
