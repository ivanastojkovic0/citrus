<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once (__DIR__ . '/vendor/autoload.php');

$routes = require __DIR__ . "/Application/config/router.php";
$path = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if(empty($path)) {
    $path = "index";
}
$action =  $routes['router'][$path]['action'];
$controller = $routes['router'][$path]['controller'];

$route = new $controller;

$folder =  explode("\\", get_class($route));
$className = $folder[count($folder) - 1];
$folderName = strtolower(substr($className, 0, strripos($className, "Controller")));

if(!empty($id)) {
    $route->setId($id);
}

if (!empty($action)) {
    $actionMethod = $action . "Action";
    $params = $route->$actionMethod();
}

include(__DIR__ . "/" . $route->getView() . "/src/view/" . $folderName . "/$path.php");
