<?php


namespace App\Controllers;

use System\Controller;
use System\Database;

class FilmsController extends Controller
{
    public function index(){
        $db = new Database;

        $this->view->render('Главная film');
    }
    public function create(){
        $this->view->render('Создать');
    }
    public function update(){
        $this->view->render('Обновить');
    }
}