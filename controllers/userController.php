<?php
include "../app/data-base.php";
include "../app/user.php";



session_start();

$db = new DB();
$connection = $db->connect();

$user = new user($connection);


if(isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($username == "" | $email == "" | $password == ""){
        if($username ==""){
            $_SESSION['username'] = "Username Must Not Be Empty.";
        }
        if($email == ""){
            $_SESSION['email'] = "Email Must Not Be Empty.";
        }
        if($password == ""){
            $_SESSION['password'] = "Password Must Not Be Empty.";
        }
        $_SESSION['expire'] = time();
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

        if($_POST['action'] == "adduser"){
            $adduser = $user->create($username,$email,$hashedPassword);
        if($adduser){
            $_SESSION['success'] = "User Account Created Successfully.";
        }else{
            $_SESSION['fail'] = "Something Went Wrong.";
        }
        $_SESSION['expire'] = time();
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
        elseif($_POST['action'] == "edituser"){
            $userId = $_POST['userId'];
            $update = $user->updateuser($username,$email,$hashedPassword,$userId);
            if($update){
                $_SESSION['success'] = "User Account Updated Successfully.";
            }else{
                $_SESSION['fail'] = "Something Went Wrong.";
            }
            $_SESSION['expire'] = time();
            header("location: ../views/backends/admin.php?page=userlist");
        }
    
        
    }

}


?>