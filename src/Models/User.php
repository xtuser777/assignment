<?php

namespace App\Models;

use PDO;

class User extends Model
{
    public $login = '';
    public $pswd = '';
    public $name = '';
    public $email = '';
    public $active = 'S';
    public $activation_code = '';
    public $priv_admin = '';

    public static function fromRow($row)
    {
        $model = new User();
        $model->login = $row['login'];
        $model->pswd = $row['pswd'];
        $model->name = $row['name'];
        $model->email = $row['email'];
        $model->active = $row['active'];
        $model->activation_code = $row['activation_code'];
        $model->priv_admin = $row['priv_admin'];

        return $model;
    }

    public function findOne($login)
    {
        $stmt = $this->selectOneStatement('atr_users', ['login' => $login]);
        if ($stmt === false) {
            return null;
        }
        if ($stmt->execute() === false) {
            return null;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $model = User::fromRow($row);

        return $model;
    }

    public function findMany($filters, $orderBy)
    {
        $stmt = $this->selectManyStatement('atr_users', $filters, $orderBy);
        if ($stmt === false) {
            return [];
        }
        if ($stmt->execute() === false) {
            return [];
        }
        $array = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $model = User::fromRow($row);
            $array[] = $model;
        }

        return $array;
    }

    public function create()
    {
        $stmt = $this->createStatement(
            'atr_users',
            ['login', 'pswd', 'name', 'email', 'active', 'activation_code', 'priv_admin'],
            [
                $this->login,
                $this->pswd,
                $this->name,
                $this->email,
                $this->active,
                $this->activation_code,
                $this->priv_admin,
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
            'atr_users',
            ['login', 'pswd', 'name', 'email', 'active', 'activation_code', 'priv_admin'],
            [
                $this->login,
                $this->pswd,
                $this->name,
                $this->email,
                $this->active,
                $this->activation_code,
                $this->priv_admin,
            ],
            [
                'login' => $this->login
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
            'atr_users',
            [
                'login' => $this->login
            ]
        );
        if ($stmt === false) {
            return false;
        }

        return $stmt->execute();
    }
}
