<?php

include_once 'controller.php';

class CandidatController extends controller
{

    protected $candidateRepository;
    protected $cvRepository;
    protected $jobRepository;

    function __construct($params)
    {
        parent::__construct($params);
        $this -> candidateRepository = new CandidateRepository();
        $this -> cvRepository = new CVRepository();
        $this -> jobRepository = new JobRepository();
    }

    public function create()
    {
        
        if (isset($_POST['btnNextCreate'])) {

            $validForm = $this->validateFirstCreateForm();
            if ($validForm) {
                $createTitle = 'Create Candidate Account 2/2';
                $createBackLink = '/candidat/create';
                require_once('views/pages/create.php');
            } else {
                require_once('views/candidat/create.php');
            }

        } else if (isset($_POST['createUser'])) {
            $validForm = $this->validateSecondCreateForm();
            if ($validForm) {
                //TODO:: store newly creadet user
                  $this->candidateRepository->create($_SESSION["candidate"]);
                unset($_SESSION["candidate"]);
                require_once('views/pages/home.php');
            } else {
                require_once('views/candidat/create.php');
            }

        } else {
            require_once('views/candidat/create.php');
        }
    }

    public function home()
    {
        $headerLinks = $this->canditatHeader();
        $headerLinks[0][2] = 'active';

        $jobList = $this -> jobRepository -> getAllJobs();
        require_once('views/candidat/home.php');
    }

    public function edit()
    {
        $candidateLoggedIn = $this -> candidateRepository -> getCandidateByUserId($_SESSION['loged']);
        if (isset($_POST["save"])) {

            $editform = $this->validateEditCVForm();
            if($editform != null){
                $editform -> id = $candidateLoggedIn -> id;
                $editform -> user = new User($candidateLoggedIn -> user -> id, null, null, null);
                $this -> candidateRepository -> updateCandidate($editform);

                $candidateLoggedIn = $this -> candidateRepository -> getCandidateByUserId($_SESSION['loged']);
                header("Location: /candidat/view");
            }
        }


        $headerLinks = $this->canditatHeader();
        $headerLinks[1][2] = 'active';
        require_once('views/candidat/edit.php');
    }

    public function job(){
        if($this -> params == null || count($this->params) == 0){
            header('Location: /');
        }
        $action = $this->params[0];
        switch($action){
            case 'apply':
                $jobId = $this -> params[1];
                $this -> applyToJob($jobId);
                break;
            default:
                header('Location: /');
                break;
        }
    }

    public function applyToJob($jobId){
        $candidateLoggedIn = $this -> candidateRepository -> getCandidateByUserId($_SESSION['loged']);
        if($candidateLoggedIn!=null)
        {
            $this -> candidateRepository -> updateCandidateAppliedJobs($candidateLoggedIn -> id, $jobId);
        }
        else{

        }
        header('Location: /');
    }

    public function view()
    {
        $headerLinks = $this->canditatHeader();
        $headerLinks[2][2] = 'active';

        $candidateLoggedIn = $this -> candidateRepository -> getCandidateByUserId($_SESSION['loged']);
        $cv = $candidateLoggedIn -> cv;
        require_once('views/candidat/view.php');
    }

    public function viewCandidate(){

        $candidateLoggedIn = $this -> candidateRepository -> getCandidateByCVId($this -> params[0]);
        $cv = $candidateLoggedIn -> cv;
        require_once('views/candidat/view.php');
    }

    public function viewCV(){

        $cv = $this -> cvRepository -> getCV($this -> params[0]);
    }

    protected function canditatHeader()
    {
        return array(
            array('/', '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Home', ''),
            array('/candidat/edit', '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit CV', ''),
            array('/candidat/view', '<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  View CV', ''),
            array('/logout', 'Logout', 'navbar-right')
        );
    }

    function validateFirstCreateForm()
    {
        $allText = '/^[a-zA-Z]+$/';
        $phoneRegex = '/^[0-9]{10,}$/';
        $textAndNumbers = '/^[a-zA-Z0-9]+$/';
        $_SESSION["errors"] = array();

        $_SESSION["candidate"] = new Candidate(time(), null, null, null, null, null, null, null);
        //First Name
        if (isset($_POST["txtFirstName"]) && $_POST["txtFirstName"] !== '') {
            if (!preg_match($allText, $_POST["txtFirstName"])) {
                array_push($_SESSION["errors"], "First Name - only literals");
            } else {
                //$_SESSION["txtFirstName"] = $_POST["txtFirstName"];
                $_SESSION["candidate"] -> firstname= $_POST["txtFirstName"];
            }

        } else {
            array_push($_SESSION["errors"], "First Name does not have value");
        }

        //Last Name
        if (isset($_POST["txtLastName"]) && $_POST["txtLastName"] !== '') {
            if (!preg_match($allText, $_POST["txtLastName"])) {
                array_push($_SESSION["errors"], "Last Name - only literals");
            } else {
                //$_SESSION["txtLastName"] = $_POST["txtLastName"];
                $_SESSION["candidate"] -> lastname = $_POST["txtLastName"];
            }
        } else {
            array_push($_SESSION["errors"], "Last Name does not have value");
        }

        //Birth Date
        if (isset($_POST["txtBirthDate"]) && $_POST["txtBirthDate"] !== '') {

            //$_SESSION["txtBirthDate"] = $_POST["txtBirthDate"];
            $_SESSION["candidate"] -> birthdate = $_POST["txtBirthDate"];
        } else {
            array_push($_SESSION["errors"], "Birth Date does not have value");
        }

        //Address
        $_SESSION["candidate"] -> address = $_POST["txtAddress"];

        //Phone
        if (isset($_POST["txtPhone"]) && $_POST["txtPhone"] !== '') {
            if (!preg_match($phoneRegex, $_POST["txtPhone"])) {
                array_push($_SESSION["errors"], "Phone - only numbers");
            } else {
                //$_SESSION["txtPhone"] = $_POST["txtPhone"];
                $_SESSION["candidate"] -> phone = $_POST["txtPhone"];
            }
        } else {
            array_push($_SESSION["errors"], "Phone does not have value");
        }

        //Email
        if (isset($_POST["txtEmail"])) {
            if (filter_var($_POST["txtEmail"], FILTER_VALIDATE_EMAIL)) {

                //$_SESSION["txtEmail"] = $_POST["txtEmail"];
                $_SESSION["candidate"] -> email = $_POST["txtEmail"];
            } else {
                array_push($_SESSION["errors"], "Email - wrong format");
            }
        } else {
            array_push($_SESSION["errors"], "Email does not have value");
        }

        return count($_SESSION["errors"]) > 0 ? false : true;
    }

    function validateSecondCreateForm()
    {
        $usernameRegex = '/^[a-zA-Z0-9]{6,}$/';
        $passwordRegex = '/^[a-zA-Z0-9]{6,}$/';

        if (isset($_POST["createUser"])) {
            $user = new User(time(), null, null, null);
            //Username
            if (isset($_POST["txtUsername"]) && $_POST["txtUsername"] !== '') {
                if (!preg_match($usernameRegex, $_POST["txtUsername"])) {
                    array_push($_SESSION["errors"], "Username - min 6 characters, without special characters");
                } else {
                    //$username = $_POST["txtUsername"];
                    $user -> username = $_POST["txtUsername"];
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
                $user -> password = $_POST["txtPassword"];
            } else {
                array_push($_SESSION["errors"], "Confirm Password does not match password value");
            }

            $_SESSION['candidate'] -> user = $user;

            return count($_SESSION["errors"]) > 0 ? false : true;
        }
    }

    function validateEditCVForm(){

        //TODO:: implement edit form validations
        $result = $this -> validateFirstCreateForm();
        if($result == false)
            return null;

        $candidate = $_SESSION['candidate'];
        unset($_SESSION['candidate']);

        $cv = new CV(time(), $_POST["txtCareerLevel"]);

        for ($i = 1; $i <= $_SESSION["education"]; $i++) {
            array_push($cv->educations, new Education(time(),null, $_POST["txtCity" . $i . "Edu"], $_POST["txtInstitution" . $i . "Edu"], $_POST["txtStartDate" . $i . "Edu"], $_POST["txtEndDate" . $i . "Edu"] ));
        }

        for ($i = 1; $i <= $_SESSION["professionalExperience"]; $i++) {
            array_push($cv->professional_experiences, new ProfessionalExperience(time(),null,
                $_POST["txtCity" . $i . "ProfEdu"],
                $_POST["txtInstitution" . $i . "ProfEdu"],
                $_POST["txtStartDate" . $i . "ProfEdu"],
                $_POST["txtEndDate" . $i . "ProfEdu"],
                $_POST["txtPosition" . $i . "ProfEdu"]));
        }

        $candidate -> cv = $cv;
        return $candidate;
    }
}
