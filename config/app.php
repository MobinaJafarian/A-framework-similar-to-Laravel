<?php



define("APP_NAME", $_ENV['APP_NAME']);
define("BASE_URL", $_ENV['APP_URL']);
define("BASE_DIR", realpath(__DIR__ . "/../"));

$current_route = explode('?', $_SERVER['REQUEST_URI'])[0];
$current_route = substr($current_route, 1);
define('CURRENT_ROUTE', $current_route);

global $routes;
$routes = [
    'get' => [],
    'post' => [],
    'put' => [],
    'delete' => [],
];
