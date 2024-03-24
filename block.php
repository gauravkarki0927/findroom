<?php

include('connect.php');
if(isset($_GET['uid'])){
    $id=$_GET['uid'];
    $sql= "UPDATE users SET Access = 0 where uid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:admin.php");  
    }
}

?>