<?php

include_once 'controller.php';

class CompanieController extends controller {

    public function create() {
        if (isset($_POST['createcompany'])) {
            $validForm = $this->validateFirstCreateForm();
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
                if(!isset($_SESSION["companys"])) {
                    $_SESSION["companys"] = array();
                }

                array_push($_SESSION["companys"], $_SESSION["company"]);
                unset($_SESSION["company"]);
                require_once('views/pages/home.php');
            } else {
                require_once('views/companie/create.php');
            }

        } else {
            require_once('views/companie/create.php');
        }
    }

    function validateFirstCreateForm() {
        $allText = '/^[a-zA-Z]+$/';
        $phoneRegex = '/^[0-9]{10,}$/';
        $_SESSION["errors"] = array();

        $_SESSION["company"] = new Company(null,null);

        $_SESSION["company"]->description = $_POST["description"];
        $_SESSION["company"]->logo = $_POST["logo"];
        
        if (isset($_POST["name"]) && $_POST["name"] !== '') {
            if (!preg_match($allText, $_POST["name"])) {
                array_push($_SESSION["errors"], "Name - only literals");
            } else {
                //$_SESSION["txtFirstName"] = $_POST["txtFirstName"];
                $_SESSION["company"]->name = $_POST["name"];
            }
        } else {
            array_push($_SESSION["errors"], "First Name does not have value");
        }

        //Address
        $_SESSION["company"]->address = $_POST["address"];

        //Phone
        if (isset($_POST["phone"]) && $_POST["phone"] !== '') {
            if (!preg_match($phoneRegex, $_POST["phone"])) {
                array_push($_SESSION["errors"], "Phone - only numbers");
            } else {
                //$_SESSION["txtPhone"] = $_POST["txtPhone"];
                $_SESSION["company"]->phone = $_POST["phone"];
            }
        } else {
            array_push($_SESSION["errors"], "Phone does not have value");
        }

        //Email
        if (isset($_POST["email"])) {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

                //$_SESSION["txtEmail"] = $_POST["txtEmail"];
                $_SESSION["company"]->email = $_POST["email"];
            } else {
                array_push($_SESSION["errors"], "Email - wrong format");
            }
        } else {
            array_push($_SESSION["errors"], "Email does not have value");
        }
        
         if (isset($_POST["cities"]) && $_POST["cities"] !== '') {
                $_SESSION["company"]->cities = $_POST["cities"];
        } else {
            array_push($_SESSION["errors"], "No city selected");
        }
        
         if (isset($_POST["domain"]) && $_POST["domain"] !== '') {
                $_SESSION["company"]->activityDomains = $_POST["domain"];
        } else {
            array_push($_SESSION["errors"], "No activity domains selected");
        }

        return count($_SESSION["errors"]) > 0 ? false : true;
    }
    
    function validateSecondCreateForm()
    {
        $usernameRegex = '/^[a-zA-Z0-9]{6,}$/';
        $passwordRegex = '/^[a-zA-Z0-9]{6,}$/';

        if (isset($_POST["createUser"])) {
            $user = new User(time(), null, null);
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

            $_SESSION['company'] -> user = $user;

            return count($_SESSION["errors"]) > 0 ? false : true;
        }
    }
    
    public function home()
    {
//        $headerLinks = $this->canditatHeader();
//        $headerLinks[0][2] = 'active';
//        $jobList = array(
//            new Job("", "TestTitle", "", "", "", new Company("", "Software")),
//            new Job("", "Title 2", "", "", "", new Company("", "Software"))
//        );
//        require_once('views/candidat/home.php');
        echo 'companie logata';
    }

}
