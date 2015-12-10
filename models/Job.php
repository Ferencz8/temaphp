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
    protected $availablePositions;
    protected $startDate;
    protected $endDate;

    protected $company;

    function __construct($id, $title, $availablepositions, $startDate, $endDate, Company $company = NULL){
        $this -> id = $id;
        $this -> title = $title;
        $this -> availablePositions = $availablepositions;
        $this -> startDate = $startDate;
        $this -> endDate = $endDate;
        $this -> company = $company;
    }
}
