<?php

namespace App\Models;

use PDO;

class Group extends Model
{
    public $id = 0;
    public $description = '';

    public static function fromRow($row)
    {
        $model = new Group();
        $model->id = $row['id'];
        $model->description = $row['description'];

        return $model;
    }

    public function findOne($id)
    {
        $stmt = $this->selectOneStatement('atr_groups', ['group_id' => $id]);
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
        $stmt = $this->selectManyStatement('atr_groups', $filters, $orderBy);
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

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_groups',
            ['description'],
            [$this->description]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }

    public function update()
    {
        $stmt = $this->updateStatement(
            'atr_groups',
            ['description'],
            [$this->description],
            [
                'group_id' => $this->id
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }

    public function delete()
    {
        $stmt = $this->deleteStatement(
            'atr_groups',
            [
                'group_id' => $this->id
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}