<?php

namespace App\Models;

use PDO;

class App extends Model
{
    public $app_name = '';
    public $app_type = '';
    public $description = '';

    public static function fromRow($row)
    {
        $model = new App();
        $model->app_name = $row['app_name'];
        $model->app_type = $row['app_type'];
        $model->description = $row['description'];

        return $model;
    }

    public function findOne($app_name)
    {
        $stmt = $this->selectOneStatement('atr_apps', ['app_name' => $app_name]);
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = App::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('atr_apps', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = App::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_apps',
            ['app_name', 'app_type', 'description'],
            [
                $this->app_name,
                $this->app_type,
                $this->description
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
            'atr_apps',
            ['app_name', 'app_type', 'description'],
            [
                $this->app_name,
                $this->app_type,
                $this->description
            ],
            [
                'app_name' => $this->app_name
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
            'atr_apps',
            [
                'app_name' => $this->app_name
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}