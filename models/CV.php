<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 3:09 PM
 */

class CV extends BaseModel{

    protected $id;
    protected $career_level;
    protected $educations;
    protected $professional_experiences;

    function __construct($id, $career_level, array $educations = array(), array $professionalExperiences = array()){
        $this -> id = $id;
        $this -> career_level = $career_level;
        $this -> educations = $educations;
        $this -> professional_experiences = $professionalExperiences;
    }

    public function &__get($property){//gets value by reference
        if(property_exists($this, $property)){
            return $this -> $property;
        }
    }
}
