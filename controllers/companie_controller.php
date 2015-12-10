<?php

include_once 'controller.php';

class CompanieController extends controller {

    public function create() {
        if (isset($_POST['createcompany'])) {
            $validCompany = true;

            //TODO: aici fa validari, dupa lungime etc
            if (!isset($_POST['name'])) {
                $validCompany = false;
                $_SESSION['createcompanyerror'] = 'A name must be introduced<br/>';
            }
            if (!isset($_POST['email'])) {
                $validCompany = false;
                $_SESSION['createcompanyerror'] = 'An name must be introduced<br/>';
            }

            if ($validCompany) {
                //Salveaza compania, trimite tip si id pe params
                $this->params['tipuser'] = 1;
                $this->params['iduser'] = 1;
                require_once('controllers/pages_controller.php');
                $controller = new PagesController($this->params);
                $controller->create();
            } else {
                require_once('views/companie/create.php');
            }
        } else {
            require_once('views/companie/create.php');
        }
    }

}
