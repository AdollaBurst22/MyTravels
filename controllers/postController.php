<?php
include "../app/data-base.php";
include "../app/post.php";
session_start();

$db = new DB();
$connection = $db->connect();
$post = new post($connection);

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($title == "" | $description == "" | $image == ""){
        if($title==""){
            $_SESSION['title']="Title Must Not Be Empty.";
        }
        if($description==""){
            $_SESSION['description']="Description Must Not Be Empty.";
        }
        if($image==""){
            $_SESSION['image']="Image Must Not Be Empty.";
        }
        $_SESSION['expire']=time();
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        $imageName = uniqid().$image;
        $tmp_name= $_FILES['image']['tmp_name'];
        $folder ="../assests/posts/";
        move_uploaded_file($tmp_name,$folder.$imageName);

        if($_POST['action']=="addpost"){
            $status = $post->create($title,$description,$imageName);

            if($status){
                $_SESSION['success'] = "Post Created Successfully.";
            }else{
                $_SESSION['fail'] = "Something Went Wrong.";
            }
            $_SESSION['expire'] = time();
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
        elseif($_POST['action']=="editpost"){
            $postId = $_POST['postId'];
            $update = $post->updatepost($title,$description,$imageName,$postId);
            if($update){
                $_SESSION['success']="Post Updated Successfully.";
            }else{
                $_SESSION['fail']="Something Went Wrong.";
            }
            $_SESSION['expire']=time();
            header("location: ../views/backends/admin.php?page=postlist");
        }
       
    }
    
}

?>