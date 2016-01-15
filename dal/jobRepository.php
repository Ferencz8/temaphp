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
            $req = $this->db->prepare('INSERT INTO jobs (companyId, title, availablepositions, startdate, enddate, description, cities, careerlevel) VALUES(:companyId, :title, :availablepositions, :startdate, :enddate, :description, :cities, :careerlevel)');
            //$req->bindParam(':id', $job->getId());
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
    
    public function update($job)
    {
        try {

            $null = null;
            $req = $this->db->prepare('update jobs set companyId=:companyId, title=:title, availablepositions=:availablepositions, startdate=:startdate, enddate=:enddate, description=:description, cities=:cities, careerlevel=:careerlevel where id =:id');
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
                                    inner join companies on companies.id = jobs.companyid
                                    where companies.userId = :id');
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
        $req = $this->db->query('SELECT * FROM jobs');
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
    
    public function searchJob($name,$city,$career)
    {
        $city2 = '%'.$city.'%';
        $name2 = '%'.$name.'%';
        $req = $this->db->prepare("SELECT * FROM jobs  WHERE title like :title and (:careerlevel =-1 or careerlevel = :careerlevel) and (:city ='%-1%' or cities  LIKE :city) ");
        $req->execute(array('title' => $name2,'city' => $city2,'careerlevel' => $career));

        $res = $req->fetchAll();

        $jobs = Job::getModels($res);
        return $jobs;
    }
    
    public function getCitySelect($selected = null)
    {
        $cr = new cityRepository();
        $arrCity = $cr->getAllCities();
        $selVal = explode(',', $selected);
        //var_dump($selVal);
        //var_dump($arrCity);
        $val = '<option value="-1"></option>';
        foreach ($arrCity as $value) {
            if($selected !=null && in_array($value['id'],$selVal) )
             $val.='<option selected value="'.$value['id'].'">'.$value['name'].'</option>';
            else
                $val.='<option value="'.$value['id'].'">'.$value['name'].'</option>';
        }
        return $val;        
    }
}