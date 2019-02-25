<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 23:00
 */

namespace App\Src\Pedido\Model\Entity;

use App\Src\Produto\Model\Entity\Produto;

class ItemPedido
{
    private $id;
    private $quantidadeProduto;
    private $valor;
    private $valorTotal;
    private $pedidoId;
    private $produtoId;
    private $pedido;
    private $produto;

    public function __construct()
    {
        $this->pedido   = new Pedido();
        $this->produto  = new Produto();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPedidoId($pedidoId)
    {
        $this->pedidoId = $pedidoId;
    }

    public function getPedidoId()
    {
        return $this->pedidoId;
    }

    public function setProdutoId($produtoId)
    {
        $this->produtoId = $produtoId;
    }

    public function getProdutoId()
    {
        return $this->produtoId;
    }

    public function setQuantidadeProduto($quantidadeProduto)
    {
        $this->quantidadeProduto = $quantidadeProduto;
    }

    public function getQuantidadeProduto()
    {
        return $this->quantidadeProduto;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getPedido()
    {
        return $this->pedido;
    }

    public function getProduto()
    {
        return $this->produto;
    }
}