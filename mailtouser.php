<?php

include('connect.php');

session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

$postid=$_SESSION['postid'];
$sql= "SELECT * from userpost where pid='$postid'";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);
$email=$row['useremail'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'findroomnp@gmail.com';
$mail->Password = 'uhty dkrt kish gwfz';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('findroomnp@gmail.com');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "[FindRoom.com Post Approvement]";
$mail->Body = "<p>Dear user, your post has been approved by the admin and is live in the website.<br>Please login to your account for further information.<br><br>Thank you<br>findroom.com</p>";
$mail->send();

header("Location:admin.php");  

?>