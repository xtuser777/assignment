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
        $model->description = $row['descrição'];
        $model->alias = $row['sigla'];
        $model->weight = $row['peso'];
        $model->max = $row['maximo'];
        $model->order = $row['ordem'];
        $model->type = $row['tipo'];
        $model->active = $row['ativo'];

        return $model;
    }
}