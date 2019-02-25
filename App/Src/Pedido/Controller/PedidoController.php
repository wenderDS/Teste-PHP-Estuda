<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:43
 */

namespace App\Src\Pedido\Controller;

use App\Src\Template\Controller\TemplateController;

class PedidoController extends TemplateController
{
    public function index()
    {
        return $this->render('Pedido/View/index');
    }
}