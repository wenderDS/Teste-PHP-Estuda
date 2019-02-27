<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 11:16
 */

namespace App\Lib;

use PDO;
use PDOException;

class Connection
{

    public static function getConnection()
    {
        $pdoParameters = DB_DRIVER . ':host=' . DB_HOST . '; dbname=' . DB_NAME;

        try {
            // cria a conexão
            $connection = new PDO($pdoParameters, DB_USER, DB_PASSWORD);
            // seta o tipo de erro para a exception do modo PDO
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // retorna a instância da conexão
            return $connection;
        } catch (PDOException $exception) {
            throw new \Exception('Ocorreu um erro ao fazer a conexão com o banco de dados', 500);
        }
    }
}