<?php


namespace App\Controllers;

use System\Controller;
use System\Auth;

class AuthController extends Controller
{
    public function login(){
        $auth = new Auth();
        $this->view->render('LogIn');

    }
    public function register(){
        $auth = Auth::getInstance();
        if(isset($_POST['submit'])){

            $query = PDO::query()($auth, "SELECT id FROM `users` WHERE login='".PDO::quote($auth, $_POST['login'])."'");
            if(mysqli_num_rows($query) > 0)
            {
                $err[] = "Пользователь с таким логином уже существует в базе данных";
            }
            if(count($err) == 0) {
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $auth->register(
                    "INSERT INTO `users`(`id`,`login`,`password`) 
                    VALUES(NULL,'" . $login . "','" . $password . "')");
            }
        }

        $this->view->render('Register');
    }
}