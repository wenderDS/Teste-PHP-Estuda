<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:43
 */

namespace App\Src\Pedido\Controller;

use App\Src\Base\Controller\Controller;
use App\Src\Pedido\Model\Entity\ItemPedido;
use App\Src\Pedido\Model\Entity\Pedido;
use App\Src\Pedido\Model\Repository\ItemPedidoRepository;
use App\Src\Pedido\Model\Repository\PedidoRepository;

class PedidoController extends Controller
{

    public function addProduto()
    {
        try{
            session_start();

            if (!isset($_SESSION['pedido'])) {
                $_SESSION['pedido'] = [];
            }

            //[produto, quantidade, valor]
            $_SESSION['pedido'][] = filter_input(INPUT_POST, 'produto', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

            return json_encode(['success' => true]);
        } catch (\Exception $exception) {
            return json_encode(['success' => false]);
        }
    }

    /**
     * 
     */
    public function createPedido()
    {

        //Persistir itens do pedido enviando o pedido

        try  {
            $produtos = $_SESSION['pedido'];

            $situacao = '';
            $cliente = '';

            $pedido = new Pedido();
            $pedido
                ->setDataPedido((new \DateTime())->format('Y-m-d'))
                ->setTotalItens(count($produtos))
                ->setValorTotal(array_sum(array_column($produtos, 'valor')))
                ->setSituacaoId($situacao)
                ->setClienteId($cliente)
            ;

            $pedidoRepository = new PedidoRepository();
            $pedidoRepository->adicionar($pedido);


            $itemPedidoRepository = new ItemPedidoRepository();
            $itemPedidoRepository->adicionarTodos($produtos, $pedido);

            $_SESSION['pedido'] = [];
        } catch(\Exception  $e) {

        }
    }

    public function showCart()
    {
        //carregar na view $_SESSION['pedido']
        //Na view o botao confirmar que chama createpedido  (submit mesmoO)
    }

}