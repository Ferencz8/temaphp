<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 3:09 PM
 */

class CV{

    private $id;
    private $career_level;
    private $educations;
    private $professional_experiences;

    function __construct($career_level, array $educations = array(), array $professionalExperiences = array()){
        $this -> career_level = $career_level;
        $this -> educations = $educations;
        $this -> professional_experiences = $professionalExperiences;
    }

    public function &__get($property){//gets value by reference
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
