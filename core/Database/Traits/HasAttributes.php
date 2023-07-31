<?php

namespace Core\Database\Traits;

trait HasAttributes
{
    protected function setAttributes(array $array, $object = null)
    {
        if (!$object) {
            $class = get_called_class();
            $object = new $class;
        }

        foreach ($array as $attribute => $value) {
            $object->$attribute = $value;
        }

        return $object;
    }

    protected function setObject(array $array)
    {
        $collection = [];
        foreach ($array as $key => $value) {
            $object = $this->setAttributes($array, $value);
            array_push($collection, $object);
        }

        $this->collection = $collection;
    }
}
