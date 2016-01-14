<?php

/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 1/14/2016
 * Time: 2:25 AM
 */
class ProfessionalExperiencesRepository
{
    protected $db;

    function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function create($profesionalExperience)
    {
        try {

            $null = null;
            $req = $this->db->prepare('INSERT INTO professionalexperiences VALUES(:id,:cvId, :city, :institution, :startdate, :enddate, :position )');
            $req->bindParam(':id', $profesionalExperience->id);
            $req->bindParam(':cvId', $profesionalExperience->cvId);
            $req->bindParam(':city', $profesionalExperience->city);
            $req->bindParam(':institution', $profesionalExperience->institution);
            $req->bindParam(':startdate', $profesionalExperience->startdate);
            $req->bindParam(':enddate', $profesionalExperience->enddate);
            $req->bindParam(':position', $profesionalExperience->position);


            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function get($educationId)
    {
        // we make sure $id is an integer
        $id = intval($educationId);

        $req = $this->db->prepare('SELECT * FROM professionalexperiences WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        var_dump($res);
        $user = ProfessionalExperience::getModel($res);

        return $user;
    }
}