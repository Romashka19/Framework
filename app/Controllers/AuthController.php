<?php


namespace App\Controllers;

use System\Controller;
use System\Auth;

class AuthController extends Controller
{
    public function login(){
        $auth = new Auth();
        $this->view->render('LogIn');
        if(isset($_POST['submit'])){
            $auth->login();
        }
    }
    public function register(){

        $this->view->render('Register');
    }
}