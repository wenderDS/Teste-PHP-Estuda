<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:44
 */

namespace App\Src\Produto\Controller;

use App\Src\Base\Controller\Controller;
use App\Src\Produto\Model\Entity\Produto;
use App\Src\Produto\Model\Repository\ProdutoRepository;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtoRepository = new ProdutoRepository();

        self::setViewParam('listaProdutos', $produtoRepository->getAll());

        if( $_SERVER['REQUEST_METHOD'] == 'GET') {
            //echo "enviado";
        }

        return $this->render('Produto/View/index');
    }

    public function incluir()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produto = new Produto();

            $produto->setDescricao($_POST['descricao']);
            $produto->setValor($_POST['valor']);

            $produtoRepository = new ProdutoRepository();

            $produtoRepository->adicionar($produto);

            $this->redirect('/produto');
        }

        return $this->render('Produto/View/new');
    }

    public function editar($parameters)
    {
        $produtoRepository = new ProdutoRepository();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produto = new Produto();

            $produto->setId($_POST['id']);
            $produto->setDescricao($_POST['descricao']);
            $produto->setValor($_POST['valor']);

            $produtoRepository->alterar($produto);

            $this->redirect('/produto');
        }

        $id         = $parameters[0];
        $produto    = $produtoRepository->getById($id);

        if (!$produto) {
            $this->redirect('/produto');
        }

        self::setViewParam('produto', $produto);

        return $this->render('Produto/View/edit');
    }

    public function delete($parameters)
    {
        $produtoRepository = new ProdutoRepository();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produto = new Produto();

            $produto->setId($_POST['id']);

            $produtoRepository->excluir($produto);

            $this->redirect('/produto');
        }

        $id         = $parameters[0];
        $produto    = $produtoRepository->getById($id);

        if (!$produto) {
            $this->redirect('/produto');
        }

        self::setViewParam('produto', $produto);

        return $this->render('Produto/View/delete');
    }
}