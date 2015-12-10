<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/16/2015
 * Time: 11:09 PM
 */

class Company extends BaseModel{

    protected $id;
    protected $name;
    protected $description;
    protected $address;
    protected $phone;
    protected $email;
    protected $logo;
    protected $cities;
    protected $activityDomains;
    
    protected $jobs;

    function __construct($id, $name,array $jobs = array()){
        $this -> id = $id;
        $this -> name = $name;
        $this -> jobs = $jobs;
    }
}