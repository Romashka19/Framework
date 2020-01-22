<?php


namespace App\Controllers;

use System\Controller;
use PDO;;
use PDOStatement;
use System\Database;

class AuthController extends Controller
{
    public function login(){
        $db = Database::getInstance();
        $res = null;
        if(isset($_SESSION["session_username"])){
            header("Location: /");
        }
        if(isset($_POST["Login"])) {
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $sql = $db->select("SELECT * FROM `users` WHERE login='" . $login . "' AND password='".$password."'");
                /*$num = current($sql);
                $num = current($num);
                debug($num);*/
                if($sql){
                        $row = current($sql);
                        $dblogin = $row['login'];
                        $dbpassword = $row['password'];

                    if($login == $dblogin && $password == $dbpassword){
                        $_SESSION['session_username'] = $login;
                        header('Location: /');
                    }
                } else {
                    echo "Неправильное имя или пароль!";
                }

            } else {
                echo "Запоните все поля!!";
            }
        }
        $this->view->render('LogIn');

    }
    public function register()
        {
            $db = Database::getInstance();
            if (isset($_POST['Register'])) {
                if (!empty($_POST['login']) && !empty($_POST['password'])) {
                    $login = $_POST['login'];
                    $password = md5($_POST['password']);
                    $sql = $db->select("SELECT COUNT(*) as count FROM `users` WHERE login='" . $login . "'");
                    $num = current($sql);
                    $num = current($num);
                    if ($num == 0) {
                        $db->create(
                            "INSERT INTO `users`(`id`,`login`,`password`) 
                    VALUES(NULL,'" . $login . "','" . $password . "')");
                        if ($db) {
                            header('Location: /');
                        }

                    } else {
                        echo "Это имя уже используеться!!!!";
                    }
                } else {
                    echo "Заполните все поля!!!!";
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