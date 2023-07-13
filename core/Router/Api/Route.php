<?php

namespace Core\Router\Web;

class Route
{

    public static function get($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['get'], array('route' => 'api/' . $route, 'controller' => $controller, 'method' => $method));
    }

    public static function post($route, $context)
    {
        $controller = $context[0];
        $method = $context[1];

        global $routes;
        array_push($routes['post'], array('route' => 'api/' . $route, 'controller' => $controller, 'method' => $method));
    }
}
