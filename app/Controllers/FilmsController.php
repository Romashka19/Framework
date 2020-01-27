<?php


namespace App\Controllers;

use System\Controller;
use System\Database;
use System\View;

class FilmsController extends Controller
{


    public function index(){

        $db = Database::getInstance();
        $data['data'] = $db->select("SELECT * FROM `films`;");
        //debug($data);
        return View::render('Главная film','default.php' ,$data);
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
                    VALUES(NULL,'" . (string)$name . "','" . (string)$director . "','" . (string)$actors . "','" . (int)$budget . "');");
            if($db){
                header('Location: /films/');
            }
        }

        View::render('Главная film','default.php');
    }
    public function update(){
        $db = Database::getInstance();
            $id = (int)$_POST['id'];
            $name = (string)$_POST['name'];
            $director = (string)$_POST['director'];
            $actors = (string)$_POST['actors'];
            $budget = (int)$_POST['budget'];
            $db->update(
                "UPDATE `films` SET name = '" . $name . "' , director='" . $director . "', actors='" . $actors . "', budget='" . $budget . "' WHERE id='$id';");

    }
    public function delete(){
        $db = Database::getInstance();
        if(isset($_POST['deleteData'])) {
            $id = $_POST['id'];
            $db->delete("DELETE FROM `films` where id= $id  ;");

        }
    }
}