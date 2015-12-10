<?php

/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 11:13 PM
 */
class BaseModel
{

    public function __get($property)
    {//gets value by reference
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}

?>