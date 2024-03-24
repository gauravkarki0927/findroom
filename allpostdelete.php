<?php

include('connect.php');

if(isset($_GET['userid'])){
    $userid=$_GET['userid'];

    $sql= "DELETE FROM userpost where userid='$userid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:userdash.php"); 
    }
}
?>