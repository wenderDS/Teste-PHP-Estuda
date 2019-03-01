<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 28/02/2019
 * Time: 23:13
 */

namespace App\Src\Cliente\Model\Repository;

use App\Src\Base\Repository\Repository;
use App\Src\Cliente\Model\Entity\Genero;

class GeneroRepository extends Repository
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT id, nome FROM genero WHERE id = $id");

        return $resultado->fetchObject(Genero::class);
    }

    public function getAll()
    {
        $resultado = $this->select("SELECT id, nome FROM genero");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Genero::class);
    }
}