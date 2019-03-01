<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 28/02/2019
 * Time: 21:38
 */

namespace App\Src\Pedido\Model\Repository;


use App\Src\Base\Repository\Repository;
use App\Src\Pedido\Model\Entity\Pedido;

class PedidoRepository extends Repository
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT 
	                pedido.id,
                    pedido.dataPedido,
                    pedido.totalItens,
                    pedido.valorTotal,
                    situacao.id AS situacaoId,
                    situacao.nome AS situacaoNome,
                    cliente.id AS clienteId,
                    cliente.nome AS clienteNome
                 FROM pedido
                 INNER JOIN cliente ON cliente.id = pedido.clienteId
                 INNER JOIN situacao ON situacao.id = pedido.situacaoId
                 WHERE id = $id"
        );

        $dataSetPedido = $resultado->fetch();
        $pedido        = new Pedido();

        if ($dataSetPedido) {
            $pedido->setId($dataSetPedido['id']);
            $pedido->setDataPedido($dataSetPedido['dataPedido']);
            $pedido->setTotalItens($dataSetPedido['totalItens']);
            $pedido->setValorTotal($dataSetPedido['valorTotal']);
            $pedido->getSituacao()->setId($dataSetPedido['situacaoId']);
            $pedido->getSituacao()->setNome($dataSetPedido['situacaoNome']);
            $pedido->getCliente()->setId($dataSetPedido['clienteId']);
            $pedido->getCliente()->setNome($dataSetPedido['clienteNome']);
        }

        return $pedido;
    }

    public function getAll()
    {
        $resultado = $this->select(
            "SELECT 
	                pedido.id,
                    pedido.dataPedido,
                    pedido.totalItens,
                    pedido.valorTotal,
                    situacao.id AS situacaoId,
                    situacao.nome AS situacaoNome,
                    cliente.id AS clienteId,
                    cliente.nome AS clienteNome
                 FROM pedido
                 INNER JOIN cliente ON cliente.id = pedido.clienteId
                 INNER JOIN situacao ON situacao.id = pedido.situacaoId
                 "
        );

        $dataSetPedidos    = $resultado->fetchAll();
        $listaPedidos      = [];

        if ($dataSetPedidos) {

            foreach ($dataSetPedidos as $dataSetPedido) {
                $pedido        = new Pedido();

                $pedido->setId($dataSetPedido['id']);
                $pedido->setDataPedido($dataSetPedido['dataPedido']);
                $pedido->setTotalItens($dataSetPedido['totalItens']);
                $pedido->setValorTotal($dataSetPedido['valorTotal']);
                $pedido->getSituacao()->setId($dataSetPedido['situacaoId']);
                $pedido->getSituacao()->setNome($dataSetPedido['situacaoNome']);
                $pedido->getCliente()->setId($dataSetPedido['clienteId']);
                $pedido->getCliente()->setNome($dataSetPedido['clienteNome']);

                $listaPedidos[] = $pedido;
            }

        }

        return $listaPedidos;
    }

    public function adicionar(Pedido &$pedido)
    {
        try {
            $rows =  $this->insert(
                'pedido',
                ":dataPedido, :totalItens, :valorTotal, :situacaoId, :clienteId",
                [
                    ':dataPedido'   => $pedido->getDataPedido()->format('Y-m-d          '),
                    ':totalItens'   => $pedido->getTotalItens(),
                    ':valorTotal'   => $pedido->getValorTotal(),
                    ':situacaoId'   => $pedido->getSituacaoId(),
                    ':clienteId'    => $pedido->getClienteId()
                ]
            );

            //Select last insert id
            $pedido->setId($this->lastIsertId() );

            return $rows;
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.' . $exception->getMessage(), 500);
        }
    }

    public function alterar(Pedido $pedido)
    {
        try {
            return $this->update(
                'pedido',
                "
                        dataPedido = :dataPedido, 
                        totalItens = :totalItens, 
                        valorTotal = :valorTotal, 
                        situacaoId = :situacaoId, 
                        clienteId = :clienteId
                 ",
                [
                    ':id'           => $pedido->getId(),
                    ':dataPedido'   => $pedido->getDataPedido(),
                    ':totalItens'   => $pedido->getTotalItens(),
                    ':valorTotal'   => $pedido->getValorTotal(),
                    ':situacaoId'   => $pedido->getSituacaoId(),
                    ':clienteId'    => $pedido->getClienteId()
                ],
                "id = :id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro na gravação de dados.', 500);
        }
    }

    public function excluir(Pedido $pedido)
    {
        try {
            $id = $pedido->getId();

            return $this->delete('pedido', "id = $id");
        } catch (\Exception $exception) {
            throw new \Exception('Erro ao excluir.', 500);
        }
    }
}