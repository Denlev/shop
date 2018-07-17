<?php

    //1.Show errors
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    //2.Set main constants
    define('ROOT', dirname(__FILE__));

    //3.Include Router file and Autoload
    require_once(ROOT.'/components/Router.php');
    require_once (ROOT.'/components/Autoload.php');

    //4.Run Router
    $router = new Router();
    $router->run();
