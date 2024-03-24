<?php
include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:userdash.php');
}

if(isset($_GET['pdata'])){
    $id=$_GET['pdata'];
    $sql= "DELETE FROM userpost where pid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location:userpost.php");  
    }
}
?>