<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 1/14/2016
 * Time: 2:24 AM
 */

class EducationRepository
{

    protected $db;

    function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function create($education)
    {
        try {

            $null = null;
            $req = $this->db->prepare('INSERT INTO educations VALUES(:id,:cvId, :city, :institution, :startdate, :enddate)');
            $req->bindParam(':id', $education->id);
            $req->bindParam(':cvId', $education->cvId);
            $req->bindParam(':city', $education->city);
            $req->bindParam(':institution', $education->institution);
            $req->bindParam(':startdate', $education->startdate);
            $req->bindParam(':enddate', $education->enddate);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function get($educationId){
        // we make sure $id is an integer
        $id = intval($educationId);

        $req = $this->db->prepare('SELECT * FROM educations WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        var_dump($res);
        $user = Education::getModel($res);

        return $user;
    }
}