<?php

include('connect.php');
include('navbar.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['submit'])){
    $message=$_POST['message'];
    $email =$_POST['email'];
    $username =$_POST['username'];
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'findroomnp@gmail.com';
    $mail->Password = 'uhty dkrt kish gwfz';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
            
    $mail->setFrom('findroomnp@gmail.com');
    $mail->addAddress('cemonjungkarki121@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "[FindRoom.com Users Message]";
    $mail->Body = "<p>Dear admin, a user has sent you email message regarding their issue.<br><br>Username: ".$username."<br>"."Email: ".$email."<br><br>"."Message: [".$message."]<br><br>Thank you for your service<br>findroom.com</p>";
    $mail->send();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Section</title>
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main">
        <div class="content">
            <div class="cont">
                <!-- image -->
            </div>
        </div>

        <section class="find">
            <h1>REACH US THROUGH</h1>
            <ul>
                <li><a class="add" href="#"><i id="add"
                            class="fa-solid fa-location-dot"></i></a>Address<br>Sankharnagar-12
                    Tilottama,<br>Rupandehi Nepal<br>-32500<br></li>
                <li><a class="call" href="#"><i class="fa-solid fa-phone"></i></a> Phone<br>071-550842</li>
                <li><a class="mail" href="#"><i class="fa-regular fa-envelope"></i></a>Email<br>findroomnp@gmail.com
                </li>
            </ul>
        </section>

        <section class="map">
            <h2>OUR DIRECTION</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d525.3657860336033!2d83.46455322869899!3d27.648489509127078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1691862451246!5m2!1sen!2snp"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section class="query">
            <div class="msgus">
                <h2>YOUR THOUGHTS ABOUT US</h2>
                <p>We are 24/7 at your service so please do not hesitate to question us. We are
                    always there for you so feel free to give your opinions and thoughts about us. Let us know about our
                    work.<br>
                    Give us your conclusion here...</p>
            </div>
        </section>

        <section class="inquery">
            <div class="form">
                <form method="POST">
                    <h1>Message Us</h1>
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="username" placeholder="Enter your name" required><br>
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="email" placeholder="Enter your email" required><br>
                    <label for="textarea">Leave your message here...</label><br>
                    <textarea rows="4" cols="16" name="message"></textarea><br>
                    <button type="submit" name="submit">Submit</button>
                    <p class="end">Thank you for choosing us<br>@findroom.com</p>
                </form>
            </div>
        </section>
    </div>
</body>

</html>