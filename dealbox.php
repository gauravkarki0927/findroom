<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
$pid= $_SESSION['postid'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_GET['db'])){
    
    $pid=$_GET['db'];
    $sql= "UPDATE userpost SET deal=1, dealerid='$id' where pid='$pid'";
    $result = mysqli_query($conn, $sql);
    if($result){
    $sqlforemail= "SELECT * FROM userpost where pid='$pid'";
    $resultofemail = mysqli_query($conn, $sqlforemail);
    
    if($resultofemail){
    $rows=mysqli_fetch_assoc($resultofemail);
    $email= $rows['useremail'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'findroomnp@gmail.com';
    $mail->Password = 'uhty dkrt kish gwfz';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('findroomnp@gmail.com');
    $mail->addAddress($rows["useremail"]);
    $mail->isHTML(true);
    $mail->Subject = "User Deal";
    $mail->Body = "<p>Dear user, a user wants to make a deal in the post you created.<br>Please login to your account for further information.<br><br>Thank you<br>findroom.com</p>";
    $mail->send();
    header("Location:userdash.php"); 
    }
}
}

?>