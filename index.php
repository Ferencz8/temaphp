<?php
//error_reporting(0);
require_once 'models/BaseModel.php';
require_once 'models/Candidate.php';
require_once 'models/Company.php';
require_once 'models/User.php';
require_once 'models/CV.php'; //problema serializare, il putem scoate dupa
require_once 'models/Education.php'; //problema serializare, il putem scoate dupa
require_once 'models/ProfessionalExperience.php'; //problema serializare, il putem scoate dupa
require_once 'dal/candidateRepository.php';
require_once 'dal/companyRepository.php';
require_once 'dal/cvRepository.php';
session_start();
require_once('core/connection.php');
require_once('core/autoloader.php');
require_once('core/errorHandler.php');

//include('core/initValues.php');


$requestedUrl = $_SERVER['REQUEST_URI'];
$uriParams = explode('?', $requestedUrl);

if(count($uriParams) == 2){$requestedUrl = $uriParams[0];}

$data = explode('/', $requestedUrl);
array_shift($data);
//var_dump($data);
if (count($data) >= 2) {
    
    $controller = $data[0];
    //$debuggerAction = explode('?', $data[1]);
    $action = $data[1];//$debuggerAction[0];//$data[1];
    $data = array_slice($data, 2);
} else {
    
    $controller = 'pages';
    $action = 'home';
    if (count($data) == 1 && $data[0]!='') {
        $action = $data[0];
    }
    $data = array();
    
}

//  if (isset($_GET['controller']) && isset($_GET['action'])) {
//    $controller = $_GET['controller'];
//    $action     = $_GET['action'];
//  } else {
//    $controller = 'pages';
//    $action     = 'home';
//  }

require_once('views/layout.php');
