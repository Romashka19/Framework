<?php


namespace app\Controllers;

use system\Controller;

class MainController extends Controller
{
    public function index(){
        echo 'werwer';
        $this->view->render('Главная');
    }
}