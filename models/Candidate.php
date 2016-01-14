<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/14/2015
 * Time: 11:49 PM
 */
class Candidate extends BaseModel{

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $birthdate;
    protected $address;
    protected $phone;
    protected $email;
    protected $user;
    protected $cv;
    protected $appliedJobs;

    function __construct($id, $fn, $ln, $birthdate, $address, $phone, $email, $appliedJobs, User $u = NULL, CV $cv = NULL){
        $this -> id = $id;
        $this -> firstname = $fn;
        $this -> lastname = $ln;
        $this -> birthdate = $birthdate;
        $this -> address = $address;
        $this -> phone = $phone;
        $this -> email = $email;
        $this -> appliedJobs = $appliedJobs;
        $this -> user = $u;
        $this -> cv = $cv;
    }

    public static function getModel($res){
        $user = new User($res['userId'],null,null,null);
        $cv = new CV($res['cvId'], null);
        return new Candidate($res['id'], $res['firstname'], $res['lastname'], $res['birthdate'], $res['address'], $res['phone'], $res['email'], null,$user, $cv);
    }
}
