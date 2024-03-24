<?php

include('connect.php');

if(isset($_GET['data'])){
    $id=$_GET['data'];

    $sql= "DELETE FROM users where uid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:admin.php"); 
    }
}

?>