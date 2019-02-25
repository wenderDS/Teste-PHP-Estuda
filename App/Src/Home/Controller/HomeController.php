<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:35
 */

namespace App\Src\Home\Controller;

use App\Src\Template\Controller\TemplateController;

class HomeController extends TemplateController
{

    public function index ()
    {
        return $this->render('Home/View/index');
    }
}