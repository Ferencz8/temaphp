<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 1/14/2016
 * Time: 12:39 AM
 */

class UserRepository{

    protected $db;

    function __construct(){
        $this->db = Db::getInstance();
    }

    public function create($user){
        try {

            $null = null;
            $req = $this->db->prepare('INSERT INTO users VALUES(:id,:username, :password, :accounttype)');
            $req->bindParam(':id', $user->id);
            $req->bindParam(':username', $user->username);
            $req->bindParam(':password', $user->password);
            $req->bindParam(':accounttype', $user->accounttype);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function getUserById($userId){

        // we make sure $id is an integer
        $id = intval($userId);

        $req = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        var_dump($res);
        $user = User::getModel($res);

        return $user;
    }

    public function getUserByUsername($username){
        $req = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $res = $req->fetch();

        var_dump($res);
        $user = User::getModel($res);

        return $user;
    }
}