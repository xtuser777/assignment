<?php

namespace App\Models;

use PDO;
use App\Tools\Database;

abstract class Model
{
    protected function createStatement($table, $columns, $values)
    {
        $conn = Database::getInstance()->getConnection();
        $cols = implode(',', $columns);
        $vals = implode(',:', $columns);
        $sql = "INSERT INTO $table($cols) VALUES(:$vals);";
        $stmt = $conn->prepare($sql);
        foreach (explode(',', ":$vals") as $key => $val) {
            $stmt->bindValue($val, $values[$key]);
        }

        return $stmt;
    }

    protected function selectOneStatement($table, $keys)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM $table";
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

    protected function selectManyStatement($table, $filters, $orderBy)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM $table";
        if (\count($filters) > 0) {
            $where = " WHERE";
            foreach ($filters as $col => $val) {
                if (\strlen($where) > 6) {
                    $where .= " AND";
                }
                if (\is_string($val)) {
                    $where .= " $col ILIKE %:$col%";
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
            $stmt->bindValue(":$col", $val);
        }

        return $stmt;
    }

    protected function updateStatement($table, $columns, $values, $filters)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "UPDATE $table";
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

    protected function deleteStatement($table, $filters)
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "DELETE FROM $table";
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
}