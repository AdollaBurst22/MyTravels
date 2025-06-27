<?php
include "header.php";
include "sideBar.php";
include "../../app/data-base.php";
include "../../app/user.php";
include "../../app/post.php";

session_start();
/*
if(!isset($_SESSION['check-user'])){
    header("location: ./Login.php");
}
*/

$db = new DB();
$connection = $db->connect();
$user = new user($connection);
$post = new post($connection);


if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == "adduser"){
        include "./users/adduser.php";
    }
    elseif($page == "userlist"){
        $userListData = $user->userList();
        include "./users/userList.php";
    }
    elseif($page == "edituser"){
        $userId = $_GET['id'];
        $usereditData = $user->useredit($userId);
        include "./users/edituser.php";
    }
    elseif($page == "deleteuser"){
        $userId = $_GET['id'];
        $deleteUser = $user->deleteuser($userId);

        include "./users/deleteuser.php";
        if($deleteUser){
            $_SESSION['success']="User Account Deleted Successfully.";
        }
        else{
            $_SESSION['fail']="Something Went Wrong.";
        }
        $_SESSION['expire'] = time();
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    elseif($page=="addpost"){
        include "./posts/addpost.php";
    }
    elseif($page=="postlist"){
        $postdata = $post->postlist();
        include "./posts/postlist.php";
    }
    elseif($page=="editpost"){
        $postId = $_GET['id'];
        $post_data = $post->postdata($postId);
        include "./posts/editpost.php";
    }
    elseif($page=="deletepost"){
        $postId=$_GET['id'];
        $delete = $post->deletepost($postId);
        if($delete){
            $_SESSION['success']="Post Deleted Successfully.";
        }else{
            $_SESSION['fail']="Something Went Wrong.";
        }
        $_SESSION['expire']=time();
        header("location: ./admin.php?page=postlist");
    }
   
}


?>



<?php
include "footer.php";