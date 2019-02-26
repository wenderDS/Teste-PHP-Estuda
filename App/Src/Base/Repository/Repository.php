<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 22:40
 */

namespace App\Src\Base\Repository;

use App\Lib\Connection;

abstract class Repository
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    public function select($sql)
    {
        if (!empty($sql)) {
            return $this->connection->query($sql);
        }

        return null;
    }

    public function insert($table, $cols, $values)
    {
        if (!empty($table) && !empty($cols) && !empty($values)) {
            $parameters = $cols;
            $cols       = str_replace(':', '', $cols);

            $stmt = $this->connection->prepare("INSERT INTO $table ($cols) VALUES ($parameters)");

            $stmt->execute($values);

            return $stmt->rowCount();
        } else {
            return null;
        }
    }

    public function update($table, $cols, $values, $where)
    {
        if (!empty($table) && !empty($cols) && !empty($values) && !empty($where)) {
            $stmt = $this->connection->prepare("UPDATE $table SET $cols WHERE $where");
            $stmt->execute($values);

            return $stmt->rowCount();
        } else {
            return null;
        }
    }

    public function delete($table, $where)
    {
        if (!empty($table) && !empty($where)) {
            $stmt = $this->connection->prepare("DELETE FROM $table WHERE $where");
            $stmt->execute();

            return $stmt->rowCount();
        } else {
            return null;
        }
    }
}