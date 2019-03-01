<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 28/02/2019
 * Time: 21:43
 */

namespace App\Src\Cliente\Model\Repository;

use App\Src\Base\Repository\Repository;
use App\Src\Cliente\Model\Entity\Cliente;

class ClienteRepository extends Repository
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT 
                    c.id AS idCliente, 
                    c.nome AS nomeCliente, 
                    c.telefone,
                    c.email, 
                    c.dataNascimento, 
                    g.id AS idGenero,
                    g.nome AS nomeGenero
                 FROM cliente AS c 
                 INNER JOIN genero AS g ON g.id = c.generoId
                 WHERE c.id = $id"
        );

        $dataSetCliente = $resultado->fetch();
        $cliente        = new Cliente();

        if ($dataSetCliente) {
            $cliente->setId($dataSetCliente['idCliente']);
            $cliente->setNome($dataSetCliente['nomeCliente']);
            $cliente->setTelefone($dataSetCliente['telefone']);
            $cliente->setEmail($dataSetCliente['email']);
            $cliente->setDataNascimento($dataSetCliente['dataNascimento']);
            $cliente->getGenero()->setId($dataSetCliente['idGenero']);
            $cliente->getGenero()->setNome($dataSetCliente['nomeGenero']);
        }

        return $cliente;
    }

    public function getAll()
    {
        $resultado = $this->select(
            "SELECT 
                    c.id AS idCliente, 
                    c.nome AS nomeCliente, 
                    c.telefone,
                    c.email, 
                    c.dataNascimento, 
                    g.id AS idGenero,
                    g.nome AS nomeGenero
                 FROM cliente AS c 
                 INNER JOIN genero AS g ON g.id = c.generoId"
        );

        $dataSetClientes    = $resultado->fetchAll();
        $listaClientes      = [];

        if ($dataSetClientes) {

            foreach ($dataSetClientes as $dataSetCliente) {
                $cliente        = new Cliente();

                $cliente->setId($dataSetCliente['idCliente']);
                $cliente->setNome($dataSetCliente['nomeCliente']);
                $cliente->setTelefone($dataSetCliente['telefone']);
                $cliente->setEmail($dataSetCliente['email']);
                $cliente->setDataNascimento($dataSetCliente['dataNascimento']);
                $cliente->getGenero()->setId($dataSetCliente['idGenero']);
                $cliente->getGenero()->setNome($dataSetCliente['nomeGenero']);

                $listaClientes[] = $cliente;
            }

        }

        return $listaClientes;
    }

    public function adicionar(Cliente $cliente)
    {
        try {
            return $this->insert(
                'cliente',
                ":id, :nome, :telefone, :email, :dataNascimento, :generoId",
                [
                    ':id'             => $cliente->getId(),
                    ':nome'           => $cliente->getNome(),
                    ':telefone'       => $cliente->getTelefone(),
                    ':email'          => $cliente->getEmail(),
                    ':dataNascimento' => $cliente->getDataNascimento(),
                    ':generoId'       => $cliente->getGeneroId()
                ]
            );
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.' . $exception->getMessage(), 500);
        }
    }

    public function alterar(Cliente $cliente)
    {
        try {
            return $this->update(
                'cliente',
                "
                        id = :id, 
                        nome = :nome, 
                        telefone = :telefone, 
                        email = :email, 
                        dataNascimento = :dataNascimento, 
                        generoId = :generoId
                 ",
                [
                    ':id'             => $cliente->getId(),
                    ':nome'           => $cliente->getNome(),
                    ':telefone'       => $cliente->getTelefone(),
                    ':email'          => $cliente->getEmail(),
                    ':dataNascimento' => $cliente->getDataNascimento(),
                    ':generoId'       => $cliente->getGeneroId()
                ],
                "id = :id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.', 500);
        }
    }

    public function excluir(Cliente $cliente)
    {
        try {
            $id = $cliente->getId();

            return $this->delete('cliente', "id = $id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro ao excluir.', 500);
        }
    }
}