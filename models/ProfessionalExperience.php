<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 3:09 PM
 */

class ProfessionalExperience extends  BaseModel{

    protected $id;
    protected $cvId;//FK
    protected $city;
    protected $institution;
    protected $startDate;
    protected $endDate;
    protected $position;

    /**
     * ProfessionalExperience constructor.
     * @param $id
     * @param $cvId
     * @param $city
     * @param $institution
     * @param $startDate
     * @param $endDate
     * @param $position
     */
    public function __construct($id,  $city, $institution, $startDate, $endDate, $position, $cvId = null)
    {
        $this->id = $id;
        $this->cvId = $cvId;
        $this->city = $city;
        $this->institution = $institution;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->position = $position;
    }


    public function &__get($property){
        if(property_exists($this, $property)){
            return $this -> $property;
        }
    }
}
