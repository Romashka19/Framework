<?php


namespace App\Controllers;

use System\Controller;
use System\Database;
use System\View;

class MainController extends Controller
{
    public function index(){
        $db = new Database;

        //View::render('Главная film','default.php');
    }
}