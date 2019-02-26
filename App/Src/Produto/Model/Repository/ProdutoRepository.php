<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 26/02/2019
 * Time: 01:01
 */

namespace App\Src\Produto\Model\Repository;

use App\Src\Base\Repository\Repository;
use App\Src\Produto\Model\Entity\Produto;

class ProdutoRepository extends Repository
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT id, descricao, valor FROM produto WHERE id = $id");

        return $resultado->fetchObject(Produto::class);
    }

    public function getAll()
    {
        $resultado = $this->select("SELECT id, descricao, valor FROM produto");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Produto::class);
    }

    public function adicionar(Produto $produto)
    {
        try {
            $descricao  = $produto->getDescricao();
            $valor      = $produto->getValor();

            return $this->insert('produto', ":descricao, :valor", [':descricao' => $descricao, ':valor' => $valor]);
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.' . $exception->getMessage(), 500);
        }
    }

    public function alterar(Produto $produto)
    {
        try {
            $id         = $produto->getId();
            $descricao  = $produto->getDescricao();
            $valor      = $produto->getValor();

            return $this->update('produto', "descricao = :descricao, valor = :valor", [':id' => $id, ':descricao' => $descricao, ':valor' => $valor], "id = :id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.', 500);
        }
    }

    public function excluir(Produto $produto)
    {
        try {
            $id = $produto->getId();

            return $this->delete('produto', "id = $id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro ao excluir.', 500);
        }
    }
}