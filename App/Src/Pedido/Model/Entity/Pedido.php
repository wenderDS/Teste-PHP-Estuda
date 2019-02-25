<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 22:08
 */

namespace App\Src\Pedido\Model\Entity;

use App\Src\Cliente\Model\Entity\Cliente;
use DateTime;

class Pedido
{
    private $id;
    private $dataPedido;
    private $totalItens;
    private $valorTotal;
    private $situacaoId;
    private $clienteId;
    private $situacao;
    private $cliente;

    public function __construct()
    {
        $this->situacao = new Situacao();
        $this->cliente  = new Cliente();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;
    }

    public function getDataPedido()
    {
        return new DateTime($this->dataPedido);
    }

    public function setTotalItens($totalItens)
    {
        $this->totalItens = $totalItens;
    }

    public function getTotalItens()
    {
        return $this->totalItens;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setSituacaoId($situacaoId)
    {
        $this->situacaoId = $situacaoId;
    }

    public function getSituacaoId()
    {
        return $this->situacaoId;
    }

    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function getClienteId()
    {
        return $this->clienteId;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function getCliente()
    {
        return $this->cliente;
    }
}