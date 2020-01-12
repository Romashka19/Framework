<?php


namespace app\Controllers;

use system\Controller;


class FilmsController extends Controller
{
    public function index(){
        echo 'view';
        var_dump($this->route);
    }
}