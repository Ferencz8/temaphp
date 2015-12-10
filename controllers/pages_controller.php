<?php

include_once 'controller.php';

class PagesController extends controller {

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

            //TODO: aici fa validari, dupa lungime etc
            if (!isset($_POST['username'])) {
                $validLogin = false;
                $_SESSION['loginerror'] = 'An username must be introduced<br/>';
            }
            if (!isset($_POST['password'])) {
                $validLogin = false;
                $_SESSION['loginerror'] = 'A password must be introduced<br/>';
            }

            if ($validLogin) {
                //TODO: login logic
                if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
                    //TODO: selecteaza tipul si fa redirect
                    $_SESSION['loged'] = 1; //userid
                    $_SESSION['accountType'] = 0; // 0- Candidat, 1- Companie
                    header('Location: /');
                } else {
                    $_SESSION['loginerror'] = 'Username and/or password are incorect';
                    header('Location: /');
                }
            } else {
                header('Location: /');
            }
        } else {
            $_SESSION['loginerror'] = 'Can not login without submiting the login form';
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
            }
            else{
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

}
