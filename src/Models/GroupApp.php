<?php

namespace App\Models;

use PDO;

class GroupApp extends Model
{
    public $group_id = 0;
    public $app_name = 'S';
    public $priv_access = 'S';
    public $priv_insert = 'S';
    public $priv_delete = 'S';
    public $priv_update = 'S';
    public $priv_export = 'S';
    public $priv_print = 'S';

    public static function fromRow($row)
    {
        $model = new GroupApp();
        $model->group_id = $row['group_id'];
        $model->app_name = $row['app_name'];
        $model->priv_access = $row['priv_access'];
        $model->priv_insert = $row['priv_insert'];
        $model->priv_delete = $row['priv_delete'];
        $model->priv_update = $row['priv_update'];
        $model->priv_export = $row['priv_export'];
        $model->priv_print = $row['priv_print'];

        return $model;
    }

    public function findOne($group_id, $app_name)
    {
        $stmt = $this->selectOneStatement(
            'atr_groups_apps',
            ['group_id' => $group_id, 'app_name' => $app_name]
        );
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = GroupApp::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('atr_groups_apps', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = GroupApp::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_groups_apps',
            [
                'group_id', 
                'app_name', 
                'priv_access', 
                'priv_insert', 
                'priv_delete', 
                'priv_update', 
                'priv_export', 
                'priv_print'],
            [
                $this->group_id,
                $this->app_name,
                $this->priv_access,
                $this->priv_insert,
                $this->priv_delete,
                $this->priv_update,
                $this->priv_export,
                $this->priv_print,
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
            'atr_groups_apps',
            [
                'priv_access', 
                'priv_insert', 
                'priv_delete', 
                'priv_update', 
                'priv_export', 
                'priv_print'],
            [
                $this->priv_access,
                $this->priv_insert,
                $this->priv_delete,
                $this->priv_update,
                $this->priv_export,
                $this->priv_print,],
            [
                'group_id' => $this->group_id,
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
            'atr_groups_apps',
            [
                'group_id' => $this->group_id,
                'app_name' => $this->app_name
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}