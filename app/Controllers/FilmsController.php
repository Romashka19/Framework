<?php


namespace App\Controllers;

use System\Controller;
use System\Database;

class FilmsController extends Controller
{


    public function index(){

        $db = Database::getInstance();
        $data['data'] = $db->select("SELECT * FROM `films`");
        //debug($data);
        return $this->view->render('Главная film',$data);
    }
    public function create(){
        $db = Database::getInstance();
        if(isset($_POST["Submit"])) {
            $name = $_POST['name'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $budget = $_POST['budget'];
            $db->create(
                "INSERT INTO `films`(`id`,`name`,`director`,`actors`,`budget`) 
                    VALUES(NULL,'" . $name . "','" . $director . "','" . $actors . "','" . $budget . "')");
        }

        $this->view->render('Создать');
    }
    public function update(){
        $db = Database::getInstance();
        if(isset($_POST["Submit"])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $budget = $_POST['budget'];
            $db->create(
                "UPDATE `films` SET name = '" . $name . "' , director='" . $director . "', actors='" . $actors . "', budget='" . $budget . "' WHERE id=" . $id);
            ;
        }
    }
    public function delete(){
        $db = Database::getInstance();
        if(isset($_POST['deleteData'])) {
            $id = $_POST['delete_id'];
            $db->delete("DELETE FROM `films` where id='$id'");
        }
    }
}