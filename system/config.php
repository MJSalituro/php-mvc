<?php

///////////////////////////////////////////////
// Valores de URI
///////////////////////////////////////////////

//URI de la peticion
define('URI', $_SERVER['REQUEST_URI']);
//Metodo de la peticion
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

///////////////////////////////////////////////
// Valores de CORE
///////////////////////////////////////////////

define('CORE', 'system/core/');
define('DEFAULT_CONTROLLER', 'Home');


///////////////////////////////////////////////
// Valores de RUTAS
///////////////////////////////////////////////

define('FOLDER_PATH', '/php-mvc/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH_VIEWS', FOLDER_PATH . 'app/views/');

define('PATH_CONTROLLERS', 'app/controllers/');
define('HELPER_PATH', 'system/helpers/');
define('PATH_UPLOAD_IMAGES', ROOT . '/uploads/');
define('LIBS_ROUTE' , ROOT . FOLDER_PATH . 'system/libs/');

///////////////////////////////////////////////
// Valores de base de datos
///////////////////////////////////////////////

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'mysql');
define('DB_NAME', 'restaurant');