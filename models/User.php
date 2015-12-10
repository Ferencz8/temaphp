<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/14/2015
 * Time: 5:04 PM
 */

class User extends BaseModel
{
    protected $id;
    protected $username;
    protected $password;

    function __construct($id, $un, $p){
        $this -> id = $id;
        $this -> username = $un;
        $this -> password = $p;
    }
}