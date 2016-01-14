<?php

class CompanyRepository {

    public function getCompanyByUserId($userId) {

            $userId=1; // asta e harcodat ca exemplu
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($userId);
        $req = $db->prepare('SELECT * FROM companies WHERE userId = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $res = $req->fetch();
        //var_dump($res
        var_dump($res);  
        $companie = new Company($res->id,null);
        //aici puneai fiecare proprietate sau faci la clasa o metoda care primeste un array si scoate din el
        //($id, $name, $description = null, $address = null, $phone = null, $email = null, $logo = null, $cities = null, $activityDomains = null, $user = null, $jobs = array())
        
        return $companie;

//        for ($i = 0; $i < count($_SESSION["companys"]); $i++) {
//            $currentCompany = $_SESSION["companys"][$i];
//            if ($currentCompany->user->id == $userId)
//                return $currentCompany;
//        }
//        return null;
    }

}
