<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 3:09 PM
 */


class Education{

    private $id;
    private $cvId;//FK
    private $city;
    private $institution;
    private $startDate;
    private $endDate;

    function __construct(){

    }

    public function __get($property){
        if(property_exists($this, $property)){
            return $this -> $property;
        }
    }

    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this -> $property = $value;
        }
    }
}
