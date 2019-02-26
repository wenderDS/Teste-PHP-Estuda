<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:43
 */

namespace App\Src\Cliente\Controller;

use App\Src\Base\Controller\Controller;

class ClienteController extends Controller
{
    public function index()
    {
        return $this->render('Cliente/View/index');
    }
}