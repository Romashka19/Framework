<?php

namespace system;



class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "film_list";
    private $dbh;
    private $query;
    private $output;

    public function __construct(){
        $this->dbh = new PDO('mysql:dbname='.$this->db.';host='.$this->host.';charset=utf8mb4', $this->user , $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function read(){

    }

    public function add(){
        $result =  $dbh->query("INSERT INTO",);
    }

    public function update(){

    }

    public function delete(){
        $sql = "delete from animals where id = " . $animal->getId();
        $this->db->runQuery($sql);
    }
}
