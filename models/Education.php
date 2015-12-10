<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 3:09 PM
 */


class Education extends BaseModel{

    protected $id;
    protected $cvId;//FK
    protected $city;
    protected $institution;
    protected $startDate;
    protected $endDate;

    /**
     * Education constructor.
     * @param $id
     * @param $cvId
     * @param $city
     * @param $institution
     * @param $startDate
     * @param $endDate
     */
    public function __construct($id, $city, $institution, $startDate, $endDate, $cvId = null)
    {
        $this->id = $id;
        $this->cvId = $cvId;
        $this->city = $city;
        $this->institution = $institution;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
}
