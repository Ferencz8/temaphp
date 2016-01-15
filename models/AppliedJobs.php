<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 1/15/2016
 * Time: 2:04 AM
 */

class AppliedJobs {

    protected $candidateId;
    protected $jobId;

    function __construct($candidateId, $jobId){
        $this -> candidateId = $candidateId;
        $this -> jobId = $jobId;
    }

    /**
     * @return mixed
     */
    public function getCandidateId()
    {
        return $this->candidateId;
    }

    /**
     * @param mixed $candidateId
     */
    public function setCandidateId($candidateId)
    {
        $this->candidateId = $candidateId;
    }

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param mixed $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }


}
