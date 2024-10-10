<?php

class DB{
    private $host = "localhost";
    private $dbname = "mytravels";
    private $name = "root";
    private $password = "";

    public function connect(){
        $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->name,$this->password);
        return $connection;
    }
}




?>