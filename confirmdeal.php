<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
$uname= $_SESSION['username'];
$uemail= $_SESSION['useremail'];
$uphone= $_SESSION['userphone'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_GET['pdata'])){
    $pid=$_GET['pdata'];
    $confirm = "UPDATE userpost SET successful=1 WHERE pid='$pid'";
    $cresult = mysqli_query($conn, $confirm);
    $sql ="SELECT email FROM userpost INNER JOIN users ON userpost.dealerid=users.uid WHERE pid='$pid'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $dealeremail = $row['email'];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'findroomnp@gmail.com';
        $mail->Password = 'uhty dkrt kish gwfz';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('findroomnp@gmail.com');
        $mail->addAddress($row["email"]);
        $mail->isHTML(true);
        $mail->Subject = "[FindRoom.com User Deal]";
        $mail->Body = "<p>Dear user, the deal you were interested has been accepted by the dealer.<br>Please login to your account for further information.<br><br>Thank you<br>findroom.com</p>";
        $mail->send();
        header("Location:userpost.php");
    }
} 
?>