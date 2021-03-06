<?php

include_once 'controller.php';

class PagesController extends controller {

    protected $userRepository;

    function __construct($params){
        parent::__construct($params);
        $this->userRepository = new UserRepository();
    }

    public function home() {
        if (!isset($_SESSION['loged'])) {
            require_once('views/pages/home.php');
        } else {
            if ($_SESSION['accountType'] == 0) {
                require_once('controllers/candidat_controller.php');
                $controller = new CandidatController($this->params);
            } else {
                require_once('controllers/companie_controller.php');
                $controller = new CompanieController($this->params);
            }
            $controller->home();
        }
    }

    public function login() {
        if (isset($_POST['login'])) {
            $validLogin = true;
            $_SESSION["errors"] = array();
            //TODO: aici fa validari, dupa lungime etc
            if (!isset($_POST['username'])) {
                $validLogin = false;
                array_push($_SESSION["errors"], "An username must be introduced");
            }
            if (!isset($_POST['password'])) {
                $validLogin = false;
                array_push($_SESSION["errors"], "A password must be introduced");
            }
            if ($validLogin) {
                //TODO: login logic
                $user = $this->searchUser($_POST['username']);
                if ($user != null && $user->password == $_POST['password']) {
                    //TODO: selecteaza tipul si fa redirect
                    $_SESSION['loged'] = $user->id; //userid
                    //$_SESSION['loged']$_SESSION['logedCandidat'] = $candidate;
                    $_SESSION['accountType'] = $user->accounttype; // 0- Candidat, 1- Companie
                    header('Location: /');
                } else {
                    array_push($_SESSION["errors"], "Username and/or password are incorect");
                    header('Location: /');
                }
            } else {
                header('Location: /');
            }
        } else {
            array_push($_SESSION["errors"], "Can not login without submiting the login form");
            header('Location: /');
        }
    }

    public function logout() {
        session_unset();
        header('Location: /');
    }

    public function create() {
        $createTitle = 'Create User';
        if (isset($this->params['tipuser'])) {
            if ($this->params['tipuser'] == 0) {
                $createTitle = 'Create Candidate Account 2/2';
            } else {
                $createTitle = 'Create Company Account 2/2';
            }
        } else {
            header('Location: /');
        }

        require_once('views/pages/create.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

//    function searchCandidate($username){
//        for($i = 0; $i < count($_SESSION["candidates"]); $i++)
//        {
//            $candidate = $_SESSION["candidates"][$i];
//            if($candidate -> user -> username == $username)
//                return $candidate;
//        }
//
//        return null;
//    }

    function searchUser($username) {
        $user = $this->userRepository->getUserByUsername($username);

//        if (isset($_SESSION["candidates"])) {
//            for ($i = 0; $i < count($_SESSION["candidates"]); $i++) {
//                $candidate = $_SESSION["candidates"][$i];
//                if ($candidate->user->username == $username)
//                    return [0, $candidate->user];
//            }
//        }
//        if (isset($_SESSION["companys"])) {
//            for ($i = 0; $i < count($_SESSION["companys"]); $i++) {
//                $company = $_SESSION["companys"][$i];
//                if ($company->user->username == $username)
//                    return [1, $company->user];
//            }
//        }

        return $user;
    }

}
