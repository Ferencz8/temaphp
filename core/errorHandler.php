<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of errorHandler
 *
 * @author Marius
 */
class errorHandler {
    //put your code here
    
    public static function getErrorsOnStack()
    {
        $errorDiv = '';
        if(isset($_SESSION["errors"]) && count($_SESSION["errors"])!= 0)
        {
            $errorDiv .= '<div class="alert alert-danger" role="alert">'
            . '<strong>Some problems have been detected</strong>';
            foreach ($_SESSION["errors"] as $errorMessaje) {
                $errorDiv.= '<p>'.$errorMessaje.'</p>';
            }
            $errorDiv.= '</div>';
            unset($_SESSION['errors']);
        }  
        return $errorDiv;
    }
    
    public static function printErrorsOnStack()
    {
        echo getErrorsOnStack();
    }
}
