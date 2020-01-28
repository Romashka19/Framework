<?php


namespace App\Controllers;

use System\Controller;
use System\Database;
use System\View;

class MainController extends Controller
{
    public function index(){
        echo "123123";
        $this->view->render('Главная film',"default");

    }
}