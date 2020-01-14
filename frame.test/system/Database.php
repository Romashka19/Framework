<?php

namespace System;

use PDO;

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "film_list";
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

    public function query($sql){
        $query = $this->db->query($sql);

        $result = $query->fetchColumn();
        return $query;
    }

    /* public function row($sql){
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
     }

     public function column($sql){
         $result = $this->query($sql);
         return $result->fetchColumn();
     }*/

    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        $q = $this->db->query($sql);
        while ($r = $q->fetch(PDO::FETCH_ASSOC)){
            $data[]=$r;
        }
        //debug($data);
        return $data;
    }
    public function create(){
        //$sql = "INSERT INTO `films` ()";
    }
    public function update($data,$id){
        $sql = "UPDATE `films` SET  WHERE id = $id";
    }
    public function delete($id,$table){
        $sql = "DELETE FROM $table WHERE id = $id";
        $this->db->prepare($sql);
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