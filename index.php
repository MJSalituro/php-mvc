<?php
require 'system/config.php';

//El archivo autoload se encarga de agregar dinamicamente los archivos de core y helper
require 'system/core/autoload.php';


//instancio la clase Router
$router = new router();

$controller = $router->getController();
$method = $router->getMethod();
$param = $router->getParam();


if(!CoreHelper::validateController($controller))
    $controller = 'ErrorPage';

    require PATH_CONTROLLERS. "{$controller}/{$controller}Controller.php";

if(!CoreHelper::validateMethodController($controller, $method))
    $method = 'exec';

$controller .= 'Controller';

//Ejecución final del controlador, método y parametro obtenido por URI
$controller = new $controller();
$controller->$method($param);
