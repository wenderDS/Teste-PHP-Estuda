<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:44
 */

namespace App\Src\Produto\Controller;

use App\Src\Template\Controller\TemplateController;

class ProdutoController extends TemplateController
{
    public function index()
    {
        return $this->render('Produto/View/index');
    }
}