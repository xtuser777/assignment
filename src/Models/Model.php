<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

abstract class Model
{
    protected $table = '';

    protected function createStatement($columns)
    {
        $conn = Database::getInstance()->getConnection();
        $keys = array_keys($columns);
        $values = implode(',:', $keys);
        $sql = "INSERT INTO $this->table VALUES(:$values);";
        $stmt = $conn->prepare($sql);
        foreach ($columns as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }

        return $stmt;
    }

    protected function selectOneStatement($keys)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM $this->table";
        if (\count($keys) > 0) {
            $where = " WHERE";
            foreach ($keys as $col => $val) {
                if (\strlen($where) > 6) {
                    $where .= " AND";
                }
                $where .= " $col = :$col";
            }
            $sql .= $where;
        }
        $stmt = $conn->prepare($sql);
        foreach ($keys as $col => $val) {
            $stmt->bindValue(":$col", $val);
        }

        return $stmt;
    }

    protected function selectManyStatement($filters, $orderBy)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM $this->table";
        if (\count($filters) > 0) {
            $where = " WHERE";
            foreach ($filters as $col => $val) {
                if (\strlen($where) > 6) {
                    $where .= " AND";
                }
                if (\is_string($val)) {
                    $where .= " $col LIKE :$col";
                } else {
                    $where .= " $col = :$col";
                }
            }
            $sql .= $where;
        }
        if (\count($orderBy) > 0) {
            $order_by = " ORDER BY";
            foreach ($orderBy as $col => $order) {
                if (\strlen($order_by) > 9) {
                    $order_by .= " AND";
                }
                $order_by .= " $col $order";
            }
            $sql .= $order_by;
        }
        $stmt = $conn->prepare($sql);
        foreach ($filters as $col => $val) {
            if (\is_string($val)) {
                $stmt->bindValue(":$col", "%$val%");
            } else {
                $stmt->bindValue(":$col", $val);
            }
        }

        return $stmt;
    }

    protected function updateStatement($columns, $values, $filters)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "UPDATE $this->table";
        $set = " SET";
        foreach ($columns as $key => $col) {
            if (\strlen($set) > 4) {
                $set .= ",";
            }
            $set .= " $col = :$col";
        }
        $sql .= $set;
        $where = " WHERE";
        foreach ($filters as $col => $val) {
            if (\strlen($where) > 6) {
                $where .= " AND";
            }
            $where .= " $col = :$col-where";
        }
        $sql .= $where;
        $stmt = $conn->prepare($sql);
        foreach ($columns as $key => $col) {
            $stmt->bindValue(":$col", $values[$key]);
        }
        foreach ($filters as $col => $val) {
            $stmt->bindValue(":$col-where", $val);
        }

        return $stmt;
    }

    protected function deleteStatement($filters)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "DELETE FROM $this->table";
        $where = " WHERE";
        foreach ($filters as $col => $val) {
            if (\strlen($where) > 6) {
                $where .= " AND";
            }
            $where .= " $col = :$col";
        }
        $sql .= $where;
        $stmt = $conn->prepare($sql);
        foreach ($filters as $col => $val) {
            $stmt->bindValue(":$col", $val);
        }

        return $stmt;
    }

    public function getLastInsertedId()
    {
        $conn = Database::getInstance()->getConnection();
        $idano = $_SESSION['YEAR'];
        $sql = "SELECT id$this->table FROM $this->table WHERE idano = $idano ORDER BY id$this->table DESC;";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            return -1;
        }
        if ($stmt->execute() === false) {
            return -1;
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row["id$this->table"];
    }
}