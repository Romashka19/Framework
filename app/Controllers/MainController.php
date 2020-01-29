<?php


namespace App\Controllers;

use System\Controller;
use System\Database;
use System\View;

class MainController extends Controller
{
    public function index(){
        $this->view->render();
    }
}