<?php
// phpinfo();

$info = $_SERVER['PATH_INFO'];
$parts = explode("/", trim($info, "/"));
// var_dump($parts);

$controller = array_shift($parts);
$method = array_shift($parts);
$params = $parts;

// var_dump($controller, $method, $params);

$controller = ucfirst($controller);
require_once("controller/".$controller.".php");

$c = new $controller();
$c->$method(...$params);
?>
