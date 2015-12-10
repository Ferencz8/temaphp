<?php
/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 6:06 PM
 */

class CandidateRepository{

    public function getCandidateByUserId($userId){
        for($i = 0; $i <count($_SESSION["candidates"]); $i++){
            $currentCandidate = $_SESSION["candidates"][$i];
            if($currentCandidate -> user -> id == $userId)
                return $currentCandidate;
        }
        return null;
    }
}