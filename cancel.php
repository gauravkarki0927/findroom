<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

if(isset($_GET['pdata'])){
    $pid=$_GET['pdata'];
    $_SESSION['pid']=$pid;
    $sql= "UPDATE userpost SET deal=0, dealerid=0 where pid='$pid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        // $sqlforemail= "SELECT * FROM userpost where pid='$pid'";
        // $resultofemail = mysqli_query($conn, $sqlforemail);
        
        // if($resultofemail){
        // $rows=mysqli_fetch_assoc($resultofemail);
        // $email= $rows['useremail'];
        // $mail = new PHPMailer(true);
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'findroomnp@gmail.com';
        // $mail->Password = 'uhty dkrt kish gwfz';
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = 465;
    
        // $mail->setFrom('findroomnp@gmail.com');
        // $mail->addAddress($email);
        // $mail->isHTML(true);
        // $mail->Subject = "[FindRoom.com User Deal]";
        // $mail->Body = "<p>Dear user, a deal was canceled by the user in the post you created.<br>Please login to your account for further information.<br>Thank you</p>";
        // $mail->send();

        header("Location:userpost.php");
    // }
}
}
?>