<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 11:11 PM
 */

class Job extends BaseModel{

    protected $id;
    protected $title;
    protected $availablepositions;
    protected $startDate;
    protected $endDate;
    protected $description;
    protected $cities;
    protected $careerlevel;

    protected $company;

    function __construct($id, Company $company, $title, $availablepositions, $startDate, $endDate, $description,$cities,$careerlevel  ){
        $this -> id = $id;
        $this -> title = $title;
        $this -> availablepositions = $availablepositions;
        $this -> startDate = $startDate;
        $this -> endDate = $endDate;
        $this -> company = $company;
        $this -> description = $description;
        $this -> cities = $cities;
        $this -> careerlevel = $careerlevel;
    }


    public static function getModel($res){
        $company = new Company($res['companyId'], null);
        return new Job($res['id'],$company, $res['title'], $res['availablepositions'], $res['startDate'], $res['endDate'], $res['description'], $res['cities'], $res['careerlevel']);
    }


    public static function getModels($res){
        $result = array();
        foreach($res as $element){
            $model = Job::getModel($element);
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAvailablepositions()
    {
        return $this->availablepositions;
    }

    /**
     * @param mixed $availablepositions
     */
    public function setAvailablepositions($availablepositions)
    {
        $this->availablepositions = $availablepositions;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param mixed $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return mixed
     */
    public function getCareerlevel()
    {
        return $this->careerlevel;
    }

    /**
     * @param mixed $careerlevel
     */
    public function setCareerlevel($careerlevel)
    {
        $this->careerlevel = $careerlevel;
    }


}
