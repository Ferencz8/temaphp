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
    protected $user;
    
    protected $jobs;

//    function __construct($id, $name,array $jobs = array()){
//        $this -> id = $id;
//        $this -> name = $name;
//        $this -> jobs = $jobs;
//    }
    
    function __construct($id, $name, $description = null, $address = null, $phone = null, $email = null, $logo = null, $cities = null, $activityDomains = null, $user = null, $jobs = array()) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->logo = $logo;
        $this->cities = $cities;
        $this->activityDomains = $activityDomains;
        $this->user = $user;
        $this->jobs = $jobs;
    }

    public static function getModel($res){
        $user = new User($res['userId'],null,null,null);
        return new Company($res['id'], $res['name'], $res['description'], $res['address'], $res['phone'], $res['email'], $res['logo'],$res['cities'],$res['cities'],$res['activityDomains'],$res['$user'], null);
    }
}