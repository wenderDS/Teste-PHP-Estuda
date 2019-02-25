<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 15:25
 */

namespace App;

use App\Src\Home\Controller\HomeController;

class App
{
    private $controller;
    private $action;
    private $params;
    private $controllerFile;
    public  $controllerName;

    public function __construct()
    {
        define('APP_HOST'       , $_SERVER['HTTP_HOST']);
        define('PATH'           , realpath('./'));
        define('TITLE'          , "Teste-PHP-Estuda");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "");
        define('DB_NAME'        , "db_teste");
        define('DB_DRIVER'      , "mysql");

        $this->url();
    }

    /**
     *
     */
    public function page()
    {
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "HomeController";
        }

        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        if (!$this->controller) {
            $this->controller = new HomeController($this);
            $this->controller->index();
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new \Exception("Página não encontrada.", 404);
        }

        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

        if (!class_exists($nomeClasse)) {
            throw new \Exception("Erro na aplicação", 500);
        }

        if (method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        }
        throw new \Exception("Página não encontrada.", 404);
//        print_r($_GET['url']);
//        $controller = new HomeController();
//        $controller->index();
    }

    public function url () {
        $url = $_SERVER['REQUEST_URI'];

        if ( (isset( $url )) && ($url != '/') ) {

            $path = ltrim($url, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);

            $path = explode('/', $path);

            $this->controller  = $path[0]? $path[0]: null;
            $this->action      = $path[1]? $path[1]: null;

        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }
}