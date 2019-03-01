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

    public function lastIsertId()
    {
        return  $this->connection->lastInsertId();
    }

    public function insertMultiple($tableName, $data)
    {
        //Will contain SQL s        nippets.
        $columns = array();

        //Will contain the values that we need to bind.
        $toBind = array();

        //Get a list of column names to use in the  SQL statement.
        $columnNames = array_keys($data[0]);

        //Loop through our $data array.
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $columns[] = "(" . implode(", ", $params) . ")";
        }

        //Construct our SQL statement
        $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $columns);

        //Prepare our PDO statement.
        $stmt = $this->connection->prepare($sql);

        //Bind our values.
        foreach($toBind as $param => $val){
            $stmt->bindValue($param, $val);
        }

        //Execute our statement (i.e. insert the data).
        return $stmt->execute();
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