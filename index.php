<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 12:18
 */

header('Content-Type: text/html; charset=utf-8');
require_once  'autoload.php';
use App\App;

$app = new App();
try {
    $app->page();
} catch (Exception $e) {
    throw new \Exception("Erro na aplicação", 500);
}