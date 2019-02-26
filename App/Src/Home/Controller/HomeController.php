<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:35
 */

namespace App\Src\Home\Controller;

use App\Src\Base\Controller\Controller;

class HomeController extends Controller
{

    public function index ()
    {
        return $this->render('Home/View/index');
    }
}