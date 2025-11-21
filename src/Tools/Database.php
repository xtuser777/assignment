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
                'mysql:host=127.0.0.1;port=3306;dbname=atribui;charset=utf8', 
                'root', 
                '.@p92m18r.', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
        }

        return $this->connection;
    }

    public function close()
    {
        $this->connection = null;
    }
}