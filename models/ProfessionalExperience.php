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
    protected $startdate;
    protected $enddate;
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
    public function __construct($id, $cvId,  $city, $institution, $startDate, $endDate, $position)
    {
        $this->id = $id;
        $this->cvId = $cvId;
        $this->city = $city;
        $this->institution = $institution;
        $this->startdate = $startDate;
        $this->enddate = $endDate;
        $this->position = $position;
    }

    public static function getModel($res)
    {
        return new ProfessionalExperience($res['id'], $res['cvId'], $res['city'], $res['institution'], $res['startdate'], $res['enddate'], $res['position']);
    }

    public static function getModels($res){
        $result = array();
        foreach($res as $element){
            $model = ProfessionalExperience::getModel($element);
            array_push($result, $model);
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCvId()
    {
        return $this->cvId;
    }

    /**
     * @param mixed $cvId
     */
    public function setCvId($cvId)
    {
        $this->cvId = $cvId;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @param mixed $institution
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
    }

    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param mixed $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param mixed $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }


}
