<?php

/**
 * Created by PhpStorm.
 * User: Ferencz_Veres
 * Date: 12/10/2015
 * Time: 6:06 PM
 */
class CandidateRepository
{

    protected $db;
    protected $cvRepository;

    function __construct()
    {
        $this->db = Db::getInstance();
        $this->cvRepository = new CVRepository();
    }

    public function create($candidate)
    {
        try {
            $userRepository = new UserRepository();
            $candidate->user->accounttype = 0;
            $userRepository->create($candidate->user);

            $null = null;
            $req = $this->db->prepare('INSERT INTO candidates VALUES(:id, :userId, :cvId, :firstname, :lastname, :birthdate, :address, :phone, :email)');
            $req->bindParam(':id', $candidate->id);
            $req->bindParam(':userId', !is_null($candidate->user) ? $candidate->user->id : $null);
            $req->bindParam(':cvId', !is_null($candidate->cv) ? $candidate->cv->id : $null);
            $req->bindParam(':firstname', $candidate->firstname);
            $req->bindParam(':lastname', $candidate->lastname);
            $req->bindParam(':birthdate', $candidate->birthdate);
            $req->bindParam(':address', $candidate->address);
            $req->bindParam(':phone', $candidate->phone);
            $req->bindParam(':email', $candidate->email);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function getCandidateByUserId($userId)
    {

        $id = intval($userId);

        $req = $this->db->prepare('SELECT * FROM candidates WHERE userId = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        $candidate = Candidate::getModel($res);



        $req = $this->db->prepare('SELECT * FROM educations WHERE cvId = :id');
        $req->execute(array('id' => $candidate->cv->id));
        $res = $req->fetchAll();

        $candidate -> cv -> educations = Education::getModels($res);

        $req = $this->db->prepare('SELECT * FROM professionalexperiences WHERE cvId = :id');
        $req->execute(array('id' => $candidate->cv->id));
        $res = $req->fetchAll();

        $candidate -> cv -> professional_experiences = ProfessionalExperience::getModels($res);
        return $candidate;
    }

    public function updateCandidate($candidate)
    {
        try {

            $this->cvRepository -> create($candidate->cv);

            $null = null;
            $req = $this->db->prepare('UPDATE candidates SET cvId =:cvId,firstname =:firstname,lastname =:lastname,birthdate =:birthdate,address =:address,phone =:phone,email =:email WHERE id =:id');
            $req->bindParam(':id', $candidate->id);
            $req->bindParam(':cvId', !is_null($candidate->cv) ? $candidate->cv->id : $null);
            $req->bindParam(':firstname', $candidate->firstname);
            $req->bindParam(':lastname', $candidate->lastname);
            $req->bindParam(':birthdate', $candidate->birthdate);
            $req->bindParam(':address', $candidate->address);
            $req->bindParam(':phone', $candidate->phone);
            $req->bindParam(':email', $candidate->email);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function updateCandidateAppliedJobs($candidateId, $jobId)
    {
        try {
            $null = null;
            $req = $this->db->prepare('INSERT INTO appliedjobs VALUES (:candidateId, :jobId)');
            $req->bindParam(':candidateId', $candidateId);
            $req->bindParam(':jobId',$jobId );

            $req->execute();
        } catch (PDOException $e) {
        }

//        for ($i = 0; $i < count($_SESSION["candidates"]); $i++) {
//            $currentCandidate = $_SESSION["candidates"][$i];
//            if ($currentCandidate->id == $candidateId) {
//                array_push($currentCandidate->appliedJobs, new Job($jobId, null, null, null, null, null));
//                break;
//            }
//        }
    }

    public function getCandidateByCVId($cvId)
    {
        for ($i = 0; $i < count($_SESSION["candidates"]); $i++) {
            $currentCandidate = $_SESSION["candidates"][$i];
            if ($currentCandidate->cv->id == $cvId)
                return $currentCandidate;
        }
        return null;
    }



    public function getCandidatesForJob($jobId){


        $req = $this->db->prepare('SELECT
candidates.*
FROM candidates
INNER JOIN appliedjobs ON appliedjobs.candidateId = candidates.Id
WHERE appliedjobs.jobId = :id');
        $req->execute(array('id' => $jobId));
        $res = $req->fetchALL();

        $candidates = Candidate::getModels($res);

        return $candidates;
    }
}