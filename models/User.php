<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/14/2015
 * Time: 5:04 PM
 */

class User
{
    private $id;
    private $username;
    private $password;

    function __construct($id, $un, $p){
        $this -> id = $id;
        $this -> username = $un;
        $this -> password = $p;
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this -> $property = $value;
        }
    }

    public function __get($property)
    {
        if(property_exists($this, $property)){
            return $this -> $property;
        }
    }
}