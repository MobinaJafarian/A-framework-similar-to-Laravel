<?php

namespace Core\Router;

use ReflectionMethod;

class Router
{
    private $current_route;
    private $method_field;
    private $routes;
    private $params = [];

    private $result = false;

    public function __construct()
    {
        $this->current_route = explode('/', CURRENT_ROUTE);
        global $routes;
        $this->routes = $routes;
        $this->method_field = $this->methodField();
    }

    public function methodField()
    {
        $method_field = strtolower($_SERVER['REQUEST_METHOD']);

        if ($method_field == 'post') {
            if ($_POST['method'] == 'put') {
                $method_field = 'put';
            }
            if ($_POST['method'] == 'delete') {
                $method_field = 'delete';
            }
        }
        return $method_field;
    }

    public function checkRoute()
    {

        $reservedRoutes = $this->routes[$this->method_field];
        foreach ($reservedRoutes as $reservedRoute) {

            $reservedRouteArray = explode('/', $reservedRoute['route']);
            if (sizeof($this->current_route) == sizeof($reservedRouteArray)) {

                foreach ($reservedRouteArray as $key => $value) {

                    if ($this->current_route[$key] == $value) {
                        if (!empty($reservedRouteArray[$key + 1])) {
                            if (substr($reservedRouteArray[$key + 1], 0, 1) == "{" &&
                                substr($reservedRouteArray[$key + 1], -1) == "}") {
                                array_push($this->params, $this->current_route[$key + 1]);
                            } else {
                                $this->params = [];
                            }
                        }

                        $controller = "\App\Http\Controllers\\" . $reservedRoute['controller'];

                        $object = new $controller();
                        if (method_exists($object, $reservedRoute['method'])) {
                            $reflection = new ReflectionMethod($controller, $reservedRoute['method']);
                            $parameterCount = $reflection->getNumberOfParameters();
                            if ($parameterCount <= count($this->params)) {
                                call_user_func_array([$object, $reservedRoute['method']], $this->params);
                            }

                        }

                        $this->result = true;

                    }

                }
            }

        }

        if (!$this->result) {
            echo 'controller not found';
        }

    }

}
