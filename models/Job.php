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

    protected $company;

    function __construct($id, Company $company, $title, $availablepositions, $startDate, $endDate){
        $this -> id = $id;
        $this -> title = $title;
        $this -> availablepositions = $availablepositions;
        $this -> startDate = $startDate;
        $this -> endDate = $endDate;
        $this -> company = $company;
    }


    public static function getModel($res){
        $company = new Company($res['companyId'], null);
        return new Job($res['id'],$company, $res['$title'], $res['$availablepositions'], $res['$startDate'], $res['$endDate']);
    }


    public static function getModels($res){
        $result = array();
        foreach($res as $element){
            $model = Job::getModel($element);
            array_push($result, $model);
        }
        return $result;
    }
}
