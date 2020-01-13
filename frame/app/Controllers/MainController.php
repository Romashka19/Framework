<?php


namespace App\Controllers;

use System\Controller;
use System\Database;

class MainController extends Controller
{
    public function index(){
        $db = new Database;
        $this->view->render('Главная cnhfybwf');
    }
}