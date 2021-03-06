<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:45
 */

namespace App\Src\Base\Controller;

abstract class Controller
{

    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getAction());
    }

    public function render($view)
    {
        $viewVar   = $this->getViewVar();

        require_once PATH . '/App/Src/Base/View/Layout/header.php';
        require_once PATH . '/App/Src/Base/View/Layout/navbar.php';
        require_once PATH . '/App/Src/' . $view . '.php';
        require_once PATH . '/App/Src/Base/View/Layout/footer.php';
    }

    public function redirect($view)
    {
        header('Location: http://' . APP_HOST . $view);
        return;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }
}