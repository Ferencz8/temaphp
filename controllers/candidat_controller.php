<?php

include_once 'controller.php';

class CandidatController extends controller
{

    public function create()
    {
        $headerLinks = $this->canditatHeader();
        $headerLinks[0][2] = 'active';
        if (isset($_POST['btnNextCreate'])) {

            $validForm = $this->validateFirstCreateForm();
            if ($validForm) {
                require_once('views/candidat/create2.php');
            } else {
                require_once('views/candidat/create.php');
            }

        } else if (isset($_POST['btnSaveNewUser'])) {
            $validForm = $this->validateSecondCreateForm();
            if ($validForm) {
                //TODO:: store newly creadet user
                if(!isset($_SESSION["candidates"])) {
                    $_SESSION["candidates"] = array();
                }

                array_push($_SESSION["candidates"], $_SESSION["candidate"]);
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
        $jobList = array(
            new Job("", "TestTitle", "", "", "", new Company("", "Software")),
            new Job("", "Title 2", "", "", "", new Company("", "Software"))
        );
        require_once('views/candidat/home.php');
    }

    public function edit()
    {
        if (isset($_POST["save"])) {
            $_SESSION["cv"] = new CV($_POST["txtCareerLevel"]);

            for ($i = 1; $i <= $_SESSION["education"]; $i++) {
                array_push($_SESSION["cv"]->educations, new Education());
                $_SESSION["cv"]->educations[$i - 1]->city = $_POST["txtCity" . $i . "Edu"];
                $_SESSION["cv"]->educations[$i - 1]->institution = $_POST["txtInstitution" . $i . "Edu"];
                $_SESSION["cv"]->educations[$i - 1]->startDate = $_POST["txtStartDate" . $i . "Edu"];
                $_SESSION["cv"]->educations[$i - 1]->endDate = $_POST["txtEndDate" . $i . "Edu"];
            }

            for ($i = 1; $i <= $_SESSION["professionalExperience"]; $i++) {
                array_push($_SESSION["cv"]->professional_experiences, new ProfessionalExperience());
                $_SESSION["cv"]->professional_experiences[$i - 1]->city = $_POST["txtCity" . $i . "ProfEdu"];
                $_SESSION["cv"]->professional_experiences[$i - 1]->institution = $_POST["txtInstitution" . $i . "ProfEdu"];
                $_SESSION["cv"]->professional_experiences[$i - 1]->startDate = $_POST["txtStartDate" . $i . "ProfEdu"];
                $_SESSION["cv"]->professional_experiences[$i - 1]->endDate = $_POST["txtEndDate" . $i . "ProfEdu"];
                $_SESSION["cv"]->professional_experiences[$i - 1]->position = $_POST["txtPosition" . $i . "ProfEdu"];
            }
            header("Location: /candidat/view");
        }


        $headerLinks = $this->canditatHeader();
        $headerLinks[1][2] = 'active';
        require_once('views/candidat/edit.php');
    }

    public function view()
    {
        $headerLinks = $this->canditatHeader();
        $headerLinks[2][2] = 'active';
        require_once('views/candidat/view.php');
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

        $_SESSION["candidate"] = new Candidate(null, null, null, null, null, null, null, null);
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

        if (isset($_POST["btnSaveNewUser"])) {
            $user = new User(null, null, null);
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
}
