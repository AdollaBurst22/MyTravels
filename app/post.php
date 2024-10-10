<?php

class post{
    private $conn;

    public function __construct($connection){
        $this->conn = $connection;
    }
    public function create($title,$description,$image){
        try{
            $status = $this->conn->prepare("INSERT INTO posts (title,description,image) VALUES (:title,:description,:image)");
            $status->bindParam(":title",$title);
            $status->bindParam(":description",$description);
            $status->bindParam(":image",$image);
            $status->execute();

            return true;


        }catch(Exception $e){
            return false;
        }
    }
    public function postlist(){
        try{

            $status=$this->conn->prepare("SELECT * FROM posts");
            $status->execute();
            $postListData = $status->fetchAll(PDO::FETCH_ASSOC);
            return $postListData;

        }catch(Exception $e){

        }

    }
    public function postdata($id){
        try{
            $status=$this->conn->prepare("SELECT * FROM posts WHERE id=:id");
            $status->bindParam(":id",$id);
            $status->execute();
            $postdata = $status->fetch(PDO::FETCH_ASSOC);
            return $postdata;

        }catch(Exception $e){

        }
    }
    public function deletepost($id){
        try{
            $status=$this->conn->prepare("DELETE FROM posts WHERE id=:id");
            $status->bindParam(":id",$id);
            $status->execute();
            return true;

        }catch(Exception $e){
            return false;
        }
    }
    public function updatepost($title,$description,$image,$id){
        try{
            $status=$this->conn->prepare("UPDATE posts SET title=:title,description=:description,image=:image WHERE id=:id");
            $status->bindParam(":title",$title);
            $status->bindParam(":description",$description);
            $status->bindParam(":image",$image);
            $status->bindParam(":id",$id);
            $status->execute();

            return true;

        }catch(Exception $e){
            return false;
        }
    }
}



?>