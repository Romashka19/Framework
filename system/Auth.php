<?php


namespace System;


class Auth
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "users";
    private $db = null;

    private static $instance = null;

    private $query;

    public function __construct(){
        $this->db = new PDO(
            'mysql:dbname='.$this->dbname.';host='.$this->host.';charset=utf8mb4',
            $this->user ,
            $this->password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    }

    public function login($login,$password){
        $query = PDO::query($this->db,"SELECT id, password FROM users WHERE login='".PDO::quote($this->db,$_POST['login'])."' LIMIT 1");
        $data = PDOStatement::fetch($query);
        if($data['password'] === password_hash($_POST['password'])) {

            //если совпадает то красота
        }

    }

    public function register(){
        $query = PDO::query($this->db, "SELECT id FROM users WHERE login='".PDO::quote($this->db, $_POST['login'])."'");
        if(PDOStatement::rowCount($query) > 0)
        {
            echo "Пользователь с таким логином уже существует в базе данных";
        }
        $login = $_POST['login'];
        $password = password_hash(trim($_POST['password']));
        mysqli_query($this->db,"INSERT INTO users SET login='".$login."', password='".$password."'");
    }


    public function logout(){

    }

}