<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cityRepository
 *
 * @author marius
 */
class cityRepository {
    //put your code here
    protected $db;

    function __construct(){
        $this->db = Db::getInstance();
    }
    
        public function getAllCities(){
        $req = $this->db->query('SELECT * FROM Cities');
        $res = $req->fetchAll();

        $cities = $res;

        return $cities;
    }
    
    
}
