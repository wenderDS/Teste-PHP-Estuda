<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:35
 */

namespace App\Src\Home\Controller;

use App\Src\Base\Controller\Controller;
use App\Src\Produto\Model\Repository\ProdutoRepository;

class HomeController extends Controller
{

    public function index ()
    {
        $repository = new ProdutoRepository();
        $produtos = $repository->getAll();

        self::setViewParam('produtos', $produtos);

        return $this->render('Home/View/index');
    }
}