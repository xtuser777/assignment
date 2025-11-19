<?php

namespace App\Models;

use PDO;

class Log extends Model
{
    public $id = 0;
    public $inserted_date = '';
    public $username = '';
    public $application = '';
    public $creator = '';
    public $ip_user = '';
    public $action = '';
    public $description = '';

    public static function fromRow($row)
    {
        $model = new Log();
        $model->id = $row['id'];
        $model->inserted_date = $row['inserted_date'];
        $model->username = $row['username'];
        $model->application = $row['application'];
        $model->creator = $row['creator'];
        $model->ip_user = $row['ip_user'];
        $model->action = $row['action'];
        $model->description = $row['description'];

        return $model;
    }

    public function findOne($id)
    {
        $stmt = $this->selectOneStatement('atr_log', ['id' => $id]);
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = Log::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('atr_log', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = Log::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_log',
            [
                'inserted_date',
                'username',
                'application',
                'creator',
                'ip_user',
                'action',
                'description'
            ],
            [
                $this->inserted_date,
                $this->username,
                $this->application,
                $this->creator,
                $this->ip_user,
                $this->action,
                $this->description,
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }

    public function update()
    {
        $stmt = $this->updateStatement(
            'atr_log',
            [
                'inserted_date',
                'username',
                'application',
                'creator',
                'ip_user',
                'action',
                'description'
            ],
            [
                $this->inserted_date,
                $this->username,
                $this->application,
                $this->creator,
                $this->ip_user,
                $this->action,
                $this->description,
            ],
            [
                'id' => $this->id
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
            'atr_log',
            [
                'id' => $this->id
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}