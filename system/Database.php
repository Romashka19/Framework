<?php

namespace System;

use PDO;

interface IDatabase
{
    public static function select($sql);
    public static function delete($sql);
    public static function update($sql);
    public static function create($sql);
}

class Database implements IDatabase
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

    public static function select($sql){
        self::connection();
        $result = self::$db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create($sql){
        self::connection();
        self::$db->query($sql);
    }
    public static function update($sql){
        self::connection();
        self::$db->query($sql);
    }
    public static function delete($sql){
        self::connection();
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