<?php

namespace App\Models;

use PDO;

class UserGroup extends Model
{
    public $login = '';
    public $group_id = 0;

    public static function fromRow($row)
    {
        $model = new UserGroup();
        $model->login = $row['login'];
        $model->group_id = $row['group_id'];

        return $model;
    }

    public function findOne($login, $group_id)
    {
        $stmt = $this->selectOneStatement(
            'atr_users_groups',
            ['group_id' => $group_id, 'login' => $login]
        );
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = UserGroup::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('atr_users_groups', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = UserGroup::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_users_groups',
            [
                'group_id', 
                'login',],
            [
                $this->group_id,
                $this->login,
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
            'atr_users_groups',
            [
                'group_id' => $this->group_id,
                'login' => $this->login
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}