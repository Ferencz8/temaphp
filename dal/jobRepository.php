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
            $req = $this->db->prepare('INSERT INTO jobs VALUES(:id,:companyId, :title, :availablepositions, :startdate, :enddate, :description, :cities, :careerlevel)');
            $req->bindParam(':id', $job->getId());
            $req->bindParam(':companyId', !is_null($job->getCompany()) ? $job->getCompany()->id : $null );
            $req->bindParam(':title', $job->getTitle());
            $req->bindParam(':availablepositions', $job->getAvailablepositions());
            $req->bindParam(':startdate', $job->getStartDate());
            $req->bindParam(':enddate', $job->getEndDate());
            $req->bindParam(':description', $job->getDescription());
            $req->bindParam(':cities', $job->getCities());
            $req->bindParam(':careerlevel', $job->getCareerlevel());

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

    public function getCompanyJobsForUser($userId){
        // we make sure $id is an integer
        $id = intval($userId);

        $req = $this->db->prepare(' select jobs.* from jobs
                                    inner join Companies on Companies.id = jobs.companyid
                                    where Companies.userId = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetchAll();

        $jobs = Job::getModels($res);

        return $jobs;
    }

    public function getJobsForUser($userId){
        // we make sure $id is an integer
        $id = intval($userId);

        $req = $this->db->prepare('SELECT * FROM jobs WHERE id = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetchAll();

        $jobs = Job::getModels($res);

        return $jobs;
    }

    public function getAllJobs(){
        $req = $this->db->prepare('SELECT * FROM jobs WHERE id = :id');
        $res = $req->fetchAll();

        $jobs = Job::getModels($res);

        return $jobs;
    }

    public function getJobsForCompany($companyId){
        // we make sure $id is an integer
        $id = intval($companyId);

        $req = $this->db->prepare('SELECT * FROM jobs  WHERE companyid = :id');
        $req->execute(array('id' => $id));
        $res = $req->fetchAll();

        $jobs = Job::getModels($res);

        return $jobs;
    }
}