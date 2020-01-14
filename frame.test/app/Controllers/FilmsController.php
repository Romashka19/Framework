<?php


namespace App\Controllers;

use System\Controller;
use System\Database;

class FilmsController extends Controller
{
    public function index(){
        $db = Database::getInstance();
        $db->select('films');
        $this->view->render('Главная film');
    }
    public function create(){
        $this->view->render('Создать');
    }
    public function update(){
        $this->view->render('Обновить');
    }
}