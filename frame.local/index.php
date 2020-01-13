<?php

require 'System/Debug.php';

use System\Route;


spl_autoload_register(function($class) {
    //$path = str_replace('\\', '/', $class.'.php');
    include str_replace('\\', '/', $class.'.php');

});
session_start();

$route = new Route;
$route->run();
