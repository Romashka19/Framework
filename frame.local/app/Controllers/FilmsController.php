<?php


namespace App\Controllers;

use System\Controller;
use System\Database;

class FilmsController extends Controller
{
    public function index(){
        $db = new Database;
        //$data = $db->row('SELECT name FROM films WHERE id = 1');
        //debug($data);
        $this->view->render('Главная film');
    }
    public function create(){
        $this->view->render('Создать');
    }
    public function update(){
        $this->view->render('Обновить');
    }
}