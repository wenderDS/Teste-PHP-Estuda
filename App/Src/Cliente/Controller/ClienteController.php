<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:43
 */

namespace App\Src\Cliente\Controller;

use App\Src\Base\Controller\Controller;
use App\Src\Cliente\Model\Entity\Cliente;
use App\Src\Cliente\Model\Repository\ClienteRepository;
use App\Src\Cliente\Model\Repository\GeneroRepository;

class ClienteController extends Controller
{
    public function index()
    {
        $clienteRepository  = new ClienteRepository();

        self::setViewParam('listaClientes', $clienteRepository->getAll());

        if( $_SERVER['REQUEST_METHOD'] == 'GET') {
            //echo "enviado";
        }

        return $this->render('Cliente/View/index');
    }

    public function incluir()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente = new Cliente();

            $cliente->setNome($_POST['nome']);
            $cliente->setTelefone($_POST['telefone']);
            $cliente->setEmail($_POST['email']);
            $cliente->setDataNascimento($_POST['dataNascimento']);
            $cliente->setGeneroId($_POST['genero']);

            $clienteRepository = new ClienteRepository();

            $clienteRepository->adicionar($cliente);

            $this->redirect('/cliente');
        }

        $generoRepository   = new GeneroRepository();
        self::setViewParam('listaGeneros', $generoRepository->getAll());

        return $this->render('Cliente/View/new');
    }

    public function editar($parameters)
    {
        $clienteRepository = new ClienteRepository();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente = new Cliente();

            $cliente->setId($_POST['id']);
            $cliente->setNome($_POST['nome']);
            $cliente->setTelefone($_POST['telefone']);
            $cliente->setEmail($_POST['email']);
            $cliente->setDataNascimento($_POST['dataNascimento']);
            $cliente->setGeneroId($_POST['genero']);

            $clienteRepository->alterar($cliente);

            $this->redirect('/cliente');
        }

        $id                 = $parameters[0];
        $cliente            = $clienteRepository->getById($id);
        $generoRepository   = new GeneroRepository();

        if (!$cliente) {
            $this->redirect('/cliente');
        }

        self::setViewParam('listaGeneros', $generoRepository->getAll());
        self::setViewParam('cliente', $cliente);

        return $this->render('Cliente/View/edit');
    }

    public function delete($parameters)
    {
        $clienteRepository = new ClienteRepository();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente = new Cliente();

            $cliente->setId($_POST['id']);

            $clienteRepository->excluir($cliente);

            $this->redirect('/cliente');
        }

        $id         = $parameters[0];
        $cliente    = $clienteRepository->getById($id);

        if (!$cliente) {
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente', $cliente);

        return $this->render('Cliente/View/delete');
    }
}