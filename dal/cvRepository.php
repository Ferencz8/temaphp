<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 12/11/2015
 * Time: 12:46 AM
 */

class CVRepository{

    public function getCV($cvId){
        for($i = 0; $i <count($_SESSION["candidates"]); $i++){
            $currentCandidate = $_SESSION["candidates"][$i];
            if($currentCandidate -> cv -> id == $cvId)
                return $currentCandidate -> cv;
        }
        return null;
    }
}