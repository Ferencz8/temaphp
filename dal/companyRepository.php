<?php

class CompanyRepository{

    public function getCompanyByUserId($userId){
        for($i = 0; $i <count($_SESSION["companys"]); $i++){
            $currentCompany = $_SESSION["companys"][$i];
            if($currentCompany -> user -> id == $userId)
                return $currentCompany;
        }
        return null;
    }
}