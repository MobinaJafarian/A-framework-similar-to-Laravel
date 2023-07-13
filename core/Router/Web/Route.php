<?php

namespace Core\Router\Web;

class Route
{

    public static function get($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['get'], array('route' => $route, 'controller' => $controller, 'method' => $method));
    }

    public static function post($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['post'], array('route' => $route, 'controller' => $controller, 'method' => $method));
    }

    public static function put($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['put'], array('route' => $route, 'controller' => $controller, 'method' => $method));
    }

    public static function delete($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['delete'], array('route' => $route, 'controller' => $controller, 'method' => $method));
    }
}
