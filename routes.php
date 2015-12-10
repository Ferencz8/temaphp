<?php

function call($controller, $action, $params) {
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'pages':
            $controller = new PagesController($params);
            break;
        case 'posts':
            // we need the model to query the database later in the controller
            require_once('models/post.php');
            $controller = new PostsController($params);
            break;
        case 'candidat':
            $controller = new CandidatController($params);
            break;
        case 'companie':
            $controller = new CompanieController($params);
            break;
    }

    $controller->{ $action }();
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'login', 'logout' ,'error'],
    'candidat' => ['home','login' , 'create', 'view', 'edit'],
    'companie' => ['home','login', 'create' , 'edit', 'post']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action, $data);
    } else {
        call('pages', 'error', array());
    }
} else {
    call('pages', 'error', array());
}
