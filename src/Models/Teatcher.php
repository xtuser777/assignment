<?php

namespace App\Models;

use App\Tools\Database;
use PDO;

class Teatcher extends Model
{
    public $idprofessor = 0;
    public $idano = 0;
    public $idunidade = 0;
    public $nome = '';
    public $rg = '';
    public $cpf = '';
    public $nascimento = 0;
    public $filhosdependentes = '';
    public $endereco = '';
    public $bairro = '';
    public $cidade = '';
    public $cep = '';
    public $telefone = '';
    public $celular = '';
    public $email = '';
    public $observacoes = '';
    public $idestado_civil = 0;
    public $idcargo = 0;
    public $iddisciplina = 0;
    public $idsituacao = 0;
    public $remocao = '';
    public $adido = '';
    public $readaptado = '';
    public $saladeleitura = '';
    public $informatica = '';
    public $cargasuplementar = '';
    public $especialidade = '';
    public $reforco = '';
    public $educacaoambiental = '';
    public $robotica = '';
    public $musica = '';

    public function __construct() {
        $this->table = 'professor';
    }

    public static function fromRow($row)
    {
        $model = new Teatcher();
        foreach($row as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }

    public function findOne($idano, $idprofessor)
    {
        $stmt = $this->selectOneStatement(['idano' => $idano, 'idprofessor' => $idprofessor]);
        if ($stmt === null) {
            return null;
        }
        if (!$stmt->execute()) {
            return null;
        }

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $model = Teatcher::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement( $filters, $orderBy);
        if ($stmt === null) {
            return [];
        }
        if (!$stmt->execute()) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $array[] = Teatcher::fromRow($row);
        }

        return $array;
    }

    public function create()
    {
        $columns = get_class_vars(\get_class($this));
        $columns = array_filter(
            $columns,
            function ($key) {
                return strcmp($key, 'table') !== 0;
            },
            ARRAY_FILTER_USE_KEY
        );
        $stmt = $this->createStatement($columns);
        if ($stmt === null) {
            return false;
        }
        if (!$stmt->execute()) {
            return false;
        }

        return $stmt->execute();
    }

    public function update()
    {
        $vars = get_class_vars(\get_class($this));
        $vars = array_filter(
            $vars,
            function ($key) {
                return strcmp($key, 'table') !== 0;
            },
            ARRAY_FILTER_USE_KEY
        );
        $columns = array_keys($vars);
        $values = array_values($vars);
        $stmt = $this->updateStatement(
            $columns,
            $values,
            ['idano' => $_SESSION['YEAR'], 'idprofessor' => $this->idprofessor]
        );
        if ($stmt === null) {
            return false;
        }
        if (!$stmt->execute()) {
            return false;
        }

        return $stmt->execute();
    }

    public function delete()
    {
        $stmt = $this->deleteStatement(
            ['idano' => $_SESSION['YEAR'], 'idprofessor' => $this->idprofessor]);
        if ($stmt === null) {
            return false;
        }
        if (!$stmt->execute()) {
            return false;
        }

        return $stmt->execute();
    }
}