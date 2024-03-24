<?php

include('connect.php');

if(isset($_GET['uid'])){
    $uid=$_GET['uid'];

    $sql= "DELETE FROM users where uid='$uid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:login.php");
    }
}
?>