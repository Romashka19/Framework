<?php


namespace App\Controllers;

use System\Auth;
use System\Controller;
use PDO;
use PDOStatement;
use System\Database;

class AuthController extends Controller
{
    public function login(){
        $db = Database::getInstance();
        $auth = new Auth();
        $res = null;
        if(isset($_POST["Login"])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $att = $auth->attempt($login,$password);
                if($att == true) {
                    $_SESSION['session_username'] = $login;
                    header('Location: /');
                } else {
                    echo "Неудачный вход";
                }
        }
        $this->view->render('LogIn');

    }
    public function register(){
        $db = Database::getInstance();
        $auth = new Auth();
        if (isset($_POST['Register'])) {
            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $check = $auth->userCheck($login, $password);
            if($check == true) {
                $db->create(
                    "INSERT INTO `users`(`id`,`login`,`password`) 
                    VALUES(NULL,'" . $login . "','" . $password . "')");
                if ($db) {
                    header('Location: /');
                }
            } else {
                echo "Неудачная регистраия";
            }
        }
            $this->view->render('Register');
    }

    public function logout(){
        unset($_SESSION['session_username']);
        session_destroy();
        header("Location: /");
    }
}