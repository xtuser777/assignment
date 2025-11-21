<?php

namespace App\Controllers;

use App\Models\Teatcher;
use App\Tools\Database;

class TeatchersController 
{
    public function findOne($idano, $idprofessor)
    {
        try {
            return (new Teatcher())->findOne($idano, $idprofessor);
        } catch (\Exception $e) {
            echo "Erro ao buscar professor: " . $e->getMessage();
        } finally {
            Database::getInstance()->close();
        }
    }

    public function findMany($filters, $orderBy)
    {
        try {
            return (new Teatcher())->findMany($filters, $orderBy);
        } catch (\Exception $e) {
            echo "Erro ao buscar professores: " . $e->getMessage();
            return [];
        } finally {
            Database::getInstance()->close();
        }
    }

    public function create($data) 
    {
        try {
            $teatcher = Teatcher::fromRow($data);
            $result = $teatcher->create();
            Database::getInstance()->getConnection()->commit();

            return $result;
        } catch (\Exception $e) {
            echo "Erro ao criar o professor: " + $e->getMessage();
            Database::getInstance()->getConnection()->rollBack();
        } finally {
            Database::getInstance()->close();
        }
    }

    public function update($idprofessor, $data) 
    {
        try {
            $teatcher = (new Teatcher())->findOne(\intval($_SESSION['YEAR']), $idprofessor);
            if ($teatcher === null) {
                return false;
            }
            foreach ($data as $prop => $value) {
                $teatcher->$prop = $value;
            }
            $result = $teatcher->update();
            Database::getInstance()->getConnection()->commit();

            return $result;
        } catch (\Exception $e) {
            echo "Erro ao criar o professor: " + $e->getMessage();
            Database::getInstance()->getConnection()->rollBack();
        } finally {
            Database::getInstance()->close();
        }
    }

    public function delete($idprofessor)
    {
        try {
            $teatcher = (new Teatcher())->findOne(\intval($_SESSION['YEAR']), $idprofessor);
            if ($teatcher === null) {
                return false;
            }
            $result = $teatcher->delete();
            Database::getInstance()->getConnection()->commit();

            return $result;
        } catch (\Exception $e) {
            echo "Erro ao criar o professor: " + $e->getMessage();
            Database::getInstance()->getConnection()->rollBack();
        } finally {
            Database::getInstance()->close();
        }
    }
}