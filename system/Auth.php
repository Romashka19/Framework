<?php


namespace System;

use PDO;


class Auth
{
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static  $dbname = "film_list";
    private static $db = null;

    private static $instance = null;

    public static function connection(){
        self::$db = new PDO(
            'mysql:dbname=film_list;host=localhost;charset=utf8mb4',
            self::$user,
            self::$password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function login($sql){
        self::connection();
        self::$db->query($sql);
        /*$query = PDO::query($this->db,"SELECT id, password FROM users WHERE login='".PDO::quote($this->db,$_POST['login'])."' LIMIT 1");
        $data = PDOStatement::fetch($query);
        if($data['password'] === password_hash($_POST['password'])) {

            //если совпадает то красота
        }
*/
    }

    public static function register($sql){
        self::connection();
        self::$db->query($sql);
    }


    public function logout(){

    }
    public function __clone(){
    }
    public function __wakeup(){
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}