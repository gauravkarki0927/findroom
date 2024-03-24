<?php

include('connect.php');
session_start();
if(empty($_SESSION['users'])){
    header('Location:login.php');
}
$id= $_SESSION['users'];
$uname=$_SESSION['username'];
$email=$_SESSION['useremail'];
$dati= "INSERT INTO logoutlink(userid, username, email) VALUES('$id','$uname','$email')";
$check = mysqli_query($conn, $dati);
session_destroy(); 
header('Location: index.php');

?>