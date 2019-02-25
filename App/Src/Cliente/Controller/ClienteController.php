<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 25/02/2019
 * Time: 00:43
 */

namespace App\Src\Cliente\Controller;

use App\Src\Template\Controller\TemplateController;

class ClienteController extends TemplateController
{
    public function index()
    {
        return $this->render('Cliente/View/index');
    }
}