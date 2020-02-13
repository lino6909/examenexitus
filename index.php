<?php
//Se llama el archivo dabases que ayudara a la conexion de base con todos los archivos que se llamen con el require//
require_once 'model/database.php';
// variable con el nombre de la carpeta cliente que se usara para especificar el fichero//
$controller = 'cliente';

// Todo esta lógica hara el papel de un FrontController, y que validar que la varieble fue llamda//
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
