<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:45
 */

namespace App\Src\Template\Controller;

abstract class TemplateController
{
    public function render($view)
    {
        require_once PATH . '/App/Src/Template/View/Layout/header.php';
        require_once PATH . '/App/Src/Template/View/Layout/navbar.php';
        require_once PATH . '/App/Src/' . $view . '.php';
        require_once PATH . '/App/Src/Template/View/Layout/footer.php';
    }

}