<?php

include_once 'controller.php';

class CompanieController extends controller {

    protected $companyRepository;
    protected $jobRepository;
    protected $candidateRepository;
    function __construct($params) {
        parent::__construct($params);
        $this -> companyRepository = new CompanyRepository();
        $this -> jobRepository = new JobRepository();
        $this -> candidateRepository = new CandidateRepository();
    }

    public function create() {
        $citySelect =  $this->jobRepository->getCitySelect();
        if (isset($_POST['createcompany'])) {
            $_SESSION['company'] = new Company(null, null);
            $validForm = $this->validateFirstCreateForm($_SESSION['company']);
            if ($validForm) {
                $createTitle = 'Create Company Account 2/2';
                $createBackLink = '/companie/create';
                require_once('views/pages/create.php');
            } else {
                require_once('views/companie/create.php');
            }
        } else if (isset($_POST['createUser'])) {
            $validForm = $this->validateSecondCreateForm();
            if ($validForm) {
                //TODO:: store newly creadet user
                $this-> companyRepository -> create($_SESSION["company"]);
                unset($_SESSION["company"]);
                require_once('views/pages/home.php');
            } else {
                require_once('views/companie/create.php');
            }
        } else {
            require_once('views/companie/create.php');
        }
    }

    function validateFirstCreateForm(&$company) {
        $allText = '/^[a-zA-Z]+$/';
        $phoneRegex = '/^[0-9]{10,}$/';
        $_SESSION["errors"] = array();

        $company->description = $_POST["description"];
        $company->logo = $_POST["logo"];

        if (isset($_POST["name"]) && $_POST["name"] !== '') {
            if (!preg_match($allText, $_POST["name"])) {
                array_push($_SESSION["errors"], "Name - only literals");
            } else {
                //$_SESSION["txtFirstName"] = $_POST["txtFirstName"];
                $company->name = $_POST["name"];
            }
        } else {
            array_push($_SESSION["errors"], "First Name does not have value");
        }

        //Address
        $company->address = $_POST["address"];

        //Phone
        if (isset($_POST["phone"]) && $_POST["phone"] !== '') {
            if (!preg_match($phoneRegex, $_POST["phone"])) {
                array_push($_SESSION["errors"], "Phone - only numbers");
            } else {
                //$_SESSION["txtPhone"] = $_POST["txtPhone"];
                $company->phone = $_POST["phone"];
            }
        } else {
            array_push($_SESSION["errors"], "Phone does not have value");
        }

        //Email
        if (isset($_POST["email"])) {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

                //$_SESSION["txtEmail"] = $_POST["txtEmail"];
                $company->email = $_POST["email"];
            } else {
                array_push($_SESSION["errors"], "Email - wrong format");
            }
        } else {
            array_push($_SESSION["errors"], "Email does not have value");
        }

        if (isset($_POST["cities"]) && $_POST["cities"] !== '') {
            $company->cities = $_POST["cities"];
        } else {
            array_push($_SESSION["errors"], "No city selected");
        }

        if (isset($_POST["domain"]) && $_POST["domain"] !== '') {
            $company->activityDomains = $_POST["domain"];
        } else {
            array_push($_SESSION["errors"], "No activity domains selected");
        }

        return count($_SESSION["errors"]) > 0 ? false : true;
    }

    function validateSecondCreateForm() {
        $usernameRegex = '/^[a-zA-Z0-9]{6,}$/';
        $passwordRegex = '/^[a-zA-Z0-9]{6,}$/';


        $user = new User(time(), null, null);
        //Username
        if (isset($_POST["txtUsername"]) && $_POST["txtUsername"] !== '') {
            if (!preg_match($usernameRegex, $_POST["txtUsername"])) {
                array_push($_SESSION["errors"], "Username - min 6 characters, without special characters");
            } else {
                //$username = $_POST["txtUsername"];
                $user->username = $_POST["txtUsername"];
            }
        } else {
            array_push($_SESSION["errors"], "Username does not have value");
        }

        //Password
        if (isset($_POST["txtPassword"]) && $_POST["txtPassword"] !== '') {
            if (!preg_match($passwordRegex, $_POST["txtPassword"])) {
                array_push($_SESSION["errors"], "Password - min 6 characters, without special characters");
            } else {
                $password = $_POST["txtPassword"];
            }
        } else {
            array_push($_SESSION["errors"], "Username does not have value");
        }

        //Confirm Password
        if (isset($_POST["txtConfirmPassword"]) && $password === $_POST["txtConfirmPassword"]) {
            //$confirmPassword = $_POST["txtConfirmPassword"];
            $user->password = $_POST["txtPassword"];
        } else {
            array_push($_SESSION["errors"], "Confirm Password does not match password value");
        }

        $_SESSION['company']->user = $user;

        return count($_SESSION["errors"]) > 0 ? false : true;
    }

    public function home() {
        $headerLinks = $this->companieHeader();
        $headerLinks[0][2] = 'active';
        if (isset($_POST["Cauta"]))
        {
            $jobList = $this -> jobRepository ->searchJob($_POST['job'],$_POST['city'],$_POST['career']);
        }
        else
        $jobList = $this -> jobRepository -> getCompanyJobsForUser($_SESSION['loged']);
        $citySelect =  $this->jobRepository->getCitySelect();
//        $jobList = array(
//            new Job("",new Company("", "Software"), "TestTitle", "", "", "",null,null,null,null ),
//            new Job("", new Company("", "Software"), "Title 2", "", "", "",null,null,null,null)
//        );
        require_once('views/companie/home.php');
    }

    public function edit() {
        $headerLinks = $this->companieHeader();
        $headerLinks[1][2] = 'active';

        $company = $this->companyRepository->getCompanyByUserId($_SESSION['loged']);
        $citySelect =  $this->jobRepository->getCitySelect();
        if (isset($_POST['edit'])) {
           //var_dump($_POST);
            $validForm = $this->validateFirstCreateForm($company);
            if ($validForm) {
                $createTitle = 'Create Company Account 2/2';
                $createBackLink = '/companie/create';

                $this -> companyRepository -> update($company);
                header("Location: /");
            } else {
                require_once('views/companie/edit.php');
            }
        } else {
            require_once('views/companie/edit.php');
        }
    }
    
    public function job(){
        if ($this->params == null || count($this->params) == 0) {
            header("Location: /");
        }
        $action = $this->params[0];
        switch ($action) {
            case 'post':
                $job = new Job(null,$this->companyRepository-> getCompanyByUserId($_SESSION['loged']), null, null, null, null, null, null, null, null);
                $this->editJob($job);
                break;
            case 'edit':
                //find job by id
                //check $this->params[1];
                $job = $this -> jobRepository->get($this->params[1]);
                $this->editJob($job);
                break;
            case 'delete':
                header("Location: /");
                break;
            
            case 'candidates':
                $this->viewJob($this->params[1]);
                break;

            default:
                header("Location: /");
                break;
        }
    }
    
    public function viewJob($jobId) {
        $job = $this -> jobRepository -> get($jobId);
        $candidateList = $this -> candidateRepository -> getCandidatesForJob($jobId);
        require_once('views/companie/viewJob.php');
    }

    public function editJob($job) {
        $headerLinks = $this->companieHeader();
        $headerLinks[2][2] = 'active';
        $citySelect =  $this->jobRepository->getCitySelect($job ->getCities());
        if (isset($_POST['jobedit'])) {
            $job -> setTitle($_POST['title']);
            $job -> setDescription($_POST['description']);
            $job -> setAvailablepositions($_POST['pos']);
            $job -> setStartDate($_POST['date1']);
            $job -> setEndDate($_POST['date2']);
            $job -> setCities(implode(',',$_POST['cities']));
            $job -> setCareerlevel($_POST['level']);
            $citySelect = $this->jobRepository->getCitySelect($job ->getCities());

            $validForm = true;//$this->validateFirstCreateForm($job); TODO:: refacut validare,  asta nu e corecta pt un Job
            if ($validForm) {
                $company = $this->companyRepository-> getCompanyByUserId($_SESSION['loged']);
                $job -> company= $company;
                if($job->getId() !=null)
                 $this->jobRepository -> update($job);   
                    else                        
                $this->jobRepository -> create($job);
                header("Location: /");
            } else {
                
                require_once('views/companie/editJob.php');
            }
        } else {
            require_once('views/companie/editJob.php');
        }
    }

    public function companieHeader() {
        return array(
            array('/', '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home', ''),
            array('/companie/edit', '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit Account', ''),
            array('/companie/job/post', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Post Job', ''),
            array('/logout', 'Logout', 'navbar-right')
        );
    }
    
    

}
