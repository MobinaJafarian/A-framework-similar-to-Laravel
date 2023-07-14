<?php

namespace Core\Router\Web;

class Route
{

    public static function get($route, $context)
    {
        $controller = $context[0];
        $controller = explode("\\", $controller);
        $controller = array_splice($controller, -1)[0];
        $method = $context[1];

        global $routes;
        array_push($routes['get'], array('route' => trim($route, "/ "), 'controller' => $controller, 'method' => $method));
    }

    public static function post($route, $context)
    {
        $controller = $context[0];
        $controller = explode("\\", $controller);
        $controller = array_splice($controller, -1)[0];
        $method = $context[1];

        global $routes;
        array_push($routes['post'], array('route' => trim($route, "/ "), 'controller' => $controller, 'method' => $method));
    }

    public static function put($route, $context)
    {
        $controller = $context[0];
        $controller = explode("\\", $controller);
        $controller = array_splice($controller, -1)[0];
        $method = $context[1];

        global $routes;
        array_push($routes['put'], array('route' => trim($route, "/ "), 'controller' => $controller, 'method' => $method));
    }

    public static function delete($route, $context)
    {
        $controller = $context[0];
        $controller = explode("\\", $controller);
        $controller = array_splice($controller, -1)[0];
        $method = $context[1];

        global $routes;
        array_push($routes['delete'], array('route' => trim($route, "/ "), 'controller' => $controller, 'method' => $method));
    }
}
