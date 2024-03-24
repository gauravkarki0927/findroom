<?php

include('connect.php');

if(isset($_GET['pid'])){
    $postid=$_GET['pid'];
    session_start();
    $_SESSION['postid']=$postid;
    $sql= "UPDATE userpost SET admin_approval=1 where pid='$postid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:mailtouser.php");
    }
}

?>