<?php
require_once '../bd/database.php';

session_name("Sesión1");
session_start();


if(!isset($_REQUEST['c']))
{    
    require_once '../HTML/index.php';
    require_once '../view/footer.php';
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llamada a la accion a realizar
    call_user_func( array( $controller, $accion ) );
}