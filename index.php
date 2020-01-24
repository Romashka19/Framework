<?php
session_start();
use System\Route;

require 'System/Debug.php';

spl_autoload_register(function ($class){
    //$path = str_replace('\\','/',$class.'.php');
    include str_replace('\\','/',$class.'.php');
    /*if(file_exists($path)){
        require $path;
    }*/

});
require 'request/routes.php';




$route = new Route;
$route->run();