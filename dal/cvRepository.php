<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 12/11/2015
 * Time: 12:46 AM
 */

class CVRepository{

    protected $db;
protected $educationRepository;
    function __construct()
    {
        $this->db = Db::getInstance();
        $this -> educationRepository = new EducationRepository();
    }

    public function create($cv){
        try {
            $null = null;
            $req = $this->db->prepare('INSERT INTO cvs VALUES(:id,:careerLevel)');
            $req->bindParam(':id', $cv->id);
            $req->bindParam(':careerLevel', $cv->career_level);

            $req->execute();

            foreach($cv -> educations as $element){
                $element->cvId = $cv ->id;
                $this -> educationRepository -> create($element);
            }
        } catch (PDOException $e) {

        }
    }

    public function getCV($cvId){
        for($i = 0; $i <count($_SESSION["candidates"]); $i++){
            $currentCandidate = $_SESSION["candidates"][$i];
            if($currentCandidate -> cv -> id == $cvId)
                return $currentCandidate -> cv;
        }
        return null;
    }
}