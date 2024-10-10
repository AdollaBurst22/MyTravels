<?php
session_start();
include "../app/data-base.php";
include "../app/login.php";



$db = new DB();
$connection = $db->connect();
$login = new login($connection);

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($email == "" | $password == ""){
        if($email == ""){
            $_SESSION['email']="Email Must Not Be Empty.";
        }
        if($password == ""){
            $_SESSION['password']="Password Must Not Be Empty.";
        }
        $_SESSION['expire']=time();
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        $loginData = $login->loginData($email);
        if($loginData['email'] == ""){
            $_SESSION['email'] = "Email Is Wrong.";
            $_SESSION['expire']= time();
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
        elseif(password_verify($password,$loginData['password'])){
            $_SESSION['check-user'] = true;
            header("location: ".$_SERVER['HTTP_REFERER']);

        }
        else{
            $_SESSION['password'] = "Password Is Wrong.";
            $_SESSION['expire'] = time();
            header("location: ".$_SERVER['HTTP_REFERER']);
        }

    }
}

if($_GET['page']=="logout"){
    unset($_SESSION['check-user']);
    header("location: ../views/backends/Login.php");
}

?>