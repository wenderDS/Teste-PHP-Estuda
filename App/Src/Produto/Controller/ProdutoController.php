<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:44
 */

namespace App\Src\Produto\Controller;

use App\Src\Base\Controller\Controller;

class ProdutoController extends Controller
{
    public function index()
    {

        return $this->render('Produto/View/index');
    }
}