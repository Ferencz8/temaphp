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
    protected $professionalexperienceRepository;
    function __construct()
    {
        $this->db = Db::getInstance();
        $this -> educationRepository = new EducationRepository();
        $this -> professionalexperienceRepository = new ProfessionalExperiencesRepository();
    }

    public function create($cv){
        try {
            $null = null;
            $req = $this->db->prepare('INSERT INTO cvs VALUES(:id,:careerLevel)');
            $req->bindParam(':id', $cv->id);
            $req->bindParam(':careerLevel', $cv->career_level);

            $req->execute();

            for($i = 0; $i < count($cv->educations); $i++){
                $cv->educations[$i]->id = time() + 1;//mai multe entitati au acelasi id
                $cv->educations[$i]->cvId = $cv ->id;
                if($i > 0)
                    $cv->educations[$i]->id = $cv->educations[$i-1]->id + 1; //da e departe de solutia ideala...dar merge.
                $this -> educationRepository -> create($cv->educations[$i]);
            }

            for($i = 0; $i < count($cv->professional_experiences); $i++){
                $cv->professional_experiences[$i]->id = time() + 1;//mai multe entitati au acelasi id
                $cv->professional_experiences[$i]->cvId = $cv ->id;
                if($i > 0)
                    $cv->professional_experiences[$i]->id = $cv->professional_experiences[$i-1]->id + 1; //da e departe de solutia ideala...dar merge.
                $this -> professionalexperienceRepository -> create($cv->professional_experiences[$i]);
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