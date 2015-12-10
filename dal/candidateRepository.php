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

    public function updateCandidate($candidate){
        for($i = 0; $i <count($_SESSION["candidates"]); $i++){
            $currentCandidate = $_SESSION["candidates"][$i];
            if($currentCandidate -> id == $candidate -> id)
            {
                $currentCandidate -> firstname = $candidate -> firstname;
                $currentCandidate -> lastname = $candidate -> lastname;
                $currentCandidate -> birthdate = $candidate -> birthdate;
                $currentCandidate -> address = $candidate -> address;
                $currentCandidate -> phone = $candidate -> phone;
                $currentCandidate -> email = $candidate -> email;
                $currentCandidate -> cv = $candidate -> cv;
                break;
            }
        }
    }
}