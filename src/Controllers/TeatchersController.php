<?php

namespace App\Controllers;

use App\Models\Teatcher;
use App\Tools\Database;
use PDOException;

class TeatchersController 
{
    public function findOne($id)
    {
        try {
            return (new Teatcher())->findOne($id);
        } catch (PDOException $e) {
            echo "Erro ao buscar professor: " . $e->getMessage();
        } finally {
            Database::getInstance()->close();
        }
    }

    public function findMany($filters, $orderBy)
    {
        try {
            return (new Teatcher())->findMany($filters, $orderBy);
        } catch (PDOException $e) {
            echo "Erro ao buscar professores: " . $e->getMessage();
            return [];
        } finally {
            Database::getInstance()->close();
        }
    }
}