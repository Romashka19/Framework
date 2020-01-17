<?php

namespace System;

use PDO;

class Database implements MyInterface
{
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static  $dbname = "film_list";
    private static $db = null;

    private static $instance = null;

    private $query = null;



    public static function connection(){
        self::$db = new PDO(
            'mysql:dbname=film_list;host=localhost;charset=utf8mb4',
             self::$user,
            self::$password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public static function query($sql){
        self::connection();
        $query = self::$db->query($sql);
        return $query;
    }

    public function select($sql)
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
        /*$sql = ;
        $q = $this->db->query($sql);
        while ($r = $q->fetch(PDO::FETCH_ASSOC)){
            $data[]=$r;
        }
        //debug($data);
        return $data;*/
    }
    public static function create($sql){
        self::connection();
        self::$db->query($sql);
        return true;
    }
    public static function update($sql){
        self::connection();
        self::$db->query($sql);
    }
    public static function delete($sql){
        self::connection();
        //debug($sql);
        self::$db->query($sql);
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