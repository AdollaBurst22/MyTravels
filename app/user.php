<?php
class user{
    private $conn;

    public function __construct($connection){
        $this->conn = $connection;
    }
    
    public function create($username,$email,$password){
        try{
            $status = $this->conn->prepare("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");
            $status->bindParam(":username",$username);
            $status->bindParam(":email",$email);
            $status->bindParam(":password",$password);
            $status->execute();

        return true;

        }catch(Exception $e){
            return false;
        }
    }
    public function userList(){
        try{
            $status = $this->conn->prepare("SELECT * FROM users");
            $status->execute();
            $userListData =$status->fetchAll(PDO::FETCH_ASSOC);
            return $userListData;

        }catch(Exception $e){


        }
    }

    public function useredit($id){
        try{
            $status= $this->conn->prepare("SELECT * FROM users WHERE id=:id");
            $status->bindParam(":id",$id);
            $status->execute();
            $usereditData = $status->fetch(PDO::FETCH_ASSOC);
            
            return $usereditData;
        }catch(Exception $e){

        }
    }
    public function updateuser($username,$email,$password,$id){
        try{
            $status = $this->conn->prepare("UPDATE users SET username=:username,email=:email,password=:password WHERE id=:id");
            $status->bindParam(":username",$username);
            $status->bindParam(":email",$email);
            $status->bindParam(":password",$password);
            $status->bindParam(":id",$id);
            $status->execute();

            return true;

        }catch(Exception $e){
            return false;
        }
    }

    public function deleteuser($id){
        try{
            $status = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $status->bindParam(":id",$id);
            $status->execute();

            return true;
        }catch(Exception $e){
            return false;
        }
    }
}


?>