<?php

$verificationcode = rand(100000, 999999);
session_start();
$_SESSION['otp'] = $verificationcode;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "findroom";

    $conn= mysqli_connect($servername,$db_username, $db_password, $dbname);
    if(!$conn){
        die(mysqli_error($conn));
    }

    $name =$_POST['name'];
    
    $email =$_POST['email'];
    $_SESSION['email'] = $email;
    $sql = "SELECT * FROM users WHERE username='$name' && email='$email'";

    $result = mysqli_query($conn, $sql);
    if($result){
        $num =mysqli_num_rows($result);
        {
            if($num>0){

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'findroomnp@gmail.com';
                $mail->Password = 'uhty dkrt kish gwfz';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
            
                $mail->setFrom('findroomnp@gmail.com');
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = "[FindRoom.com Account Verification]";
                $mail->Body = "<p>Your OTP code for password reset is <b style='font-size:24px;margin-left:20px;'><br>$verificationcode</b><br>Please do not share this message with anyone<br>Ignore this email if it was not you who asked for password reset for an account you created in FindRoom.com<br><br>Thank you for your time<br>FindRoom.com<br>Web-Portal</p>";
                $mail->send();

                echo
                "
                <script>
                    alert('Verification code has been sent to your registered Email ID');
                    document.location.href = 'otp.php';
                </script>
                ";
            }

            else{
                echo
                "
                <script>
                    alert('Email not registered!');
                    document.location.href = 'forget.php';
                </script>
                ";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="forget.css">
</head>

<body>
    <div class="box">
        <form action="" method="POST" autocomplete="off" autosuggestion="off">
            <img src="rantel.png" alt="logo">
            <div class="top">
                <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
                <p class="ar">Account recovery</p>
            </div>
            <div class="msg">
                <p class="foremail">Please enter your username and email that you have registered in Web-Portal</p>
            </div>
            <div class="ib">
                <input type="text" name="name" placeholder="Enter your name" required>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="sub">
                <p class="last">Please click button on the right to get your OTP</p>
                <button type="submit" value="submit" name="send">Get OTP</button>
            </div>
        </form>
    </div>
</body>

</html>