<?php

namespace System;

use PDO;

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "film_list";
    private $db;

    private $output;

    public function __construct(){
        $this->db = new PDO('mysql:dbname='.$this->dbname.';host='.$this->host.';charset=utf8mb4', $this->user , $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function query($sql){
        $query = $this->db->query($sql);
        $result = $query->fetchColumn();
        return $query;
    }

    public function row($sql){
       $result = $this->query($sql);
       return $result->fetchAll(PDO::FETCH_ASSOC);
    }
/*
    public function column($sql){
        $result = $this->query($sql);
        return $result->fetchColumn();
    }*/
}
