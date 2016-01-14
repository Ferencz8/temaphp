<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 1/14/2016
 * Time: 1:55 AM
 */

class JobRepository{

    protected $db;

    function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function create($job)
    {
        try {

            $null = null;
            $req = $this->db->prepare('INSERT INTO jobs VALUES(:id,:companyId, :title, :availablepositions, :startdate, :enddate)');
            $req->bindParam(':id', $job->id);
            $req->bindParam(':companyId', $job->companyId);
            $req->bindParam(':title', $job->title);
            $req->bindParam(':availablepositions', $job->availablepositions);
            $req->bindParam(':startdate', $job->startdate);
            $req->bindParam(':enddate', $job->enddate);

            $req->execute();
        } catch (PDOException $e) {

        }
    }

    public function get($jobId){
        // we make sure $id is an integer
        $id = intval($jobId);

        $req = $this->db->prepare('SELECT * FROM jobs WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        $job = Job::getModel($res);

        return $job;
    }

    public function getForUser($userId){
        // we make sure $id is an integer
        $id = intval($userId);

        $req = $this->db->prepare('SELECT * FROM jobs WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetch();

        $jobs = Job::getModels($res);

        return $jobs;
    }

    public function getAllJobs(){
        $req = $this->db->prepare('SELECT * FROM jobs WHERE id = :id');
        $res = $req->fetch();

        $jobs = Job::getModels($res);

        return $jobs;
    }
}