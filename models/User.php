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
    protected $accounttype;

    function __construct($id, $un, $p, $a){
        $this -> id = $id;
        $this -> username = $un;
        $this -> password = $p;
        $this -> accounttype = $a;
    }

    public static function getModel(array $res){
        return new User($res['id'], $res['username'], $res['password'], $res['accounttype']);
    }
}