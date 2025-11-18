<?php

namespace App\Tools;

use PDO;

class Database
{
    private static $instance = null;
    private $connection = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        if ($this->connection === null) {
            $this->connection = new PDO(
                'mysql:host=localhost;port=3306;dbname=atribui;charset=utf8', 
                'root', 
                '.@p92m18r.');
        }

        return $this->connection;
    }
}