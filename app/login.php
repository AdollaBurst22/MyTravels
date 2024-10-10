<?php
class login{
    private $conn;

    public function __construct($connection){
        $this->conn = $connection;
    }
    
    public function loginData($email){
        try{
            $status= $this->conn->prepare("SELECT * FROM users WHERE email=:email");
            $status->bindParam(":email",$email);
            $status->execute();
            $loginData = $status->fetch(PDO::FETCH_ASSOC);
            return $loginData;

        }catch(Exception $e){

        }
    }
    
}

?>