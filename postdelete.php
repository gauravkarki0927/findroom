<?php

include('connect.php');

if(isset($_GET['pdata'])){
    $id=$_GET['pdata'];

    $sql= "DELETE FROM userpost where pid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:admin.php");  
    }
}
?>