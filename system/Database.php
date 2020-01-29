<?php

namespace System;

use PDO;

interface IDatabase
{
    public static function select(string $sql): array;
    public static function delete(string $sql): void;
    public static function update(string $sql): void;
    public static function create(string $sql,array $data): void;
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

    public static function select(string $sql) : array {
        self::connection();
        $result = self::$db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create(string $sql,array $data) : void{
        self::connection();
        $name = $data['name'];
        $director = $data['director'];
        $actors = $data['actors'];
        $budget = $data['budget'];
        $sth = self::$db->prepare($sql);
        $sth->bindParam(':name',$name,PDO::PARAM_STR,10);
        $sth->bindParam(':director',$director,PDO::PARAM_STR,10);
        $sth->bindParam(':actors',$actors,PDO::PARAM_STR,100);
        $sth->bindParam(':budget',$budget,PDO::PARAM_INT,10);
        $sth->execute();
        //self::$db->query($sql);
    }
    public static function update( string $sql): void{
        self::connection();
        self::$db->query($sql);
    }
    public static function delete(string $sql): void{
        self::connection();
        self::$db->query($sql);
    }

    public function quote(string $value) : string{
        self::connection();
        $value = self::$db->quote($value);
        return $value;
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