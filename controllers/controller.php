<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author marius
 */
class controller {
    //put your code here
    protected $params = array();
    
    function __construct($params) {
        $this->params = $params;
        
    }
    function getParams() {
        return $this->params;
    }

    function setParams($params) {
        $this->params = $params;
    }



    
}
