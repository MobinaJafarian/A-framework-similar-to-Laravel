<?php

namespace Core\Database\Traits;

trait HasMethodCaller
{
    private $methods = ['insert', 'update', 'find', 'get', 'delete', 'where', 'orderBy', 'limit'];

    private function methodCaller($object, $method, $params)
    {
        return call_user_func_array(array($object, $method), $params);
    }
}
