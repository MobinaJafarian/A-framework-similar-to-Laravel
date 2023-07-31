<?php

namespace Core\Database\Traits;

trait HasAttributes
{
    protected function setAttribute(array $array, $object=null)
    {
        if(!$object)
        {
            $class = get_called_class();
            $object= new $class;
        }

        foreach($array as $attribute => $value)
        {
            $object->$attribute = $value;
        }

        return $object;
    }
}