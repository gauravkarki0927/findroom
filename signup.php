<?php
include('connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["submit"])){

    $useremail =$_POST['email'];
    $checksql ="SELECT * FROM users WHERE email='$useremail'";
    $checkresult = mysqli_query($conn, $checksql);
    if(mysqli_num_rows($checkresult)>0){
        echo "<script> alert('Email already exist!');</script>";
    }
    $verificationcode = rand(100000, 999999);
    session_start();
    $_SESSION['emailvalidation'] = $verificationcode;

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['number'] = $_POST['number'];
    $_SESSION['password'] = $_POST['pass'];

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
    $mail->Subject = "[FindRoom.com Email Verification]";
    $mail->Body = "<p>Your verification code for account registration is <b style='font-size:24px;margin-left:20px;'><br>$verificationcode</b><br>Please do not share this message with anyone<br><br>Thank you for your time<br>FindRoom.com<br>Web-Portal</p>";
    $mail->send();
    echo
    "
    <script>
        alert('Verification CODE has been sent to your registered Email ID');
        document.location.href = 'emailvalidation.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <script>
        function signup() {
            var a = document.forms["sign"]["name"];
            var b = document.forms["sign"]["email"];
            var c = document.forms["sign"]["number"].value;
            var d = document.forms["sign"]["pass"].value;
            var e = document.forms["sign"]["cpass"].value;
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var name = /^[A-Za-z ]*$/;
            var errors = document.getElementById('error');
            var names = document.getElementById('name');
            var email = document.getElementById('email');
            var phone = document.getElementById('number');
            var pass = document.getElementById('pass');
            var cpass = document.getElementById('cpass');

            if (a.value === "") {
                names.style.border ="1px solid red";
                document.getElementsByName('name')[0].placeholder = 'Invalid Username';
                return false;
            } else if (!a.value.match(name)) {
                names.style.border = "1px solid red";
                document.getElementsByName('name')[0].placeholder = 'Invalid Name Format!';
                return false;
            } else if (!b.value.match(validRegex)) {
                email.style.border ="1px solid red";
                document.getElementsByName('email')[0].placeholder = 'Invalid Email Format!';
                names.style.border = "";
                return false;
            } else if (!c.match(/[0-9]/)) {
                phone.style.border ="1px solid red";
                document.getElementsByName('number')[0].placeholder = 'Invalid Phone Number!';
                names.style.border = "";
                email.style.border = "";
                return false;
            } else if (d == "") {
                pass.style.border ="1px solid red";
                document.getElementsByName('pass')[0].placeholder = 'Invalid Password!';
                names.style.border = "";
                email.style.border = "";
                phone.style.border = "";
                return false;
            } else if (e == "") {
                cpass.style.border ="1px solid red";
                document.getElementsByName('cpass')[0].placeholder = 'Password not matched!';
                names.style.border = "";
                email.style.border = "";
                phone.style.border = "";
                pass.style.border = "";
                return false;
            } else if (d != e){
                cpass.style.border ="1px solid red";
                names.style.border = "";
                email.style.border = "";
                phone.style.border = "";
                pass.style.border = "";
                return false;
            } 
            else {
                return true;
            }
        }
    </script>
</head>

<body>
    <nav>
        <div class="logo">
            <p class="h">f!nd<span>Room</span><span class="nep">.com</span></p>
        </div>
        <div class="let">
            <ul class="pc">
                <li><a href="index.php">Homepage</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="box">
        <form method="POST" autocomplete="off" autosuggestion="off" name="sign" onsubmit="return signup()">
            <img src="rantel.png" alt="logo">
            <i class="fa-solid fa-user-plus"></i>
            <div class="top">
                <p class="ar">Signup For Portal</p>
            </div>
            <div class="msg">
                <p class="foremail" id="error">Fill up your details to create account for Web-Portal</p>
            </div>
            <div class="ib">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="email" id="email" placeholder="Enter your email">
                <input type="text" name="number" id="number" placeholder="Enter your number" maxlength="10" minlength="10">
                <div class="pass">
                <input type="password" name="pass" id="pass" placeholder="Enter password" minlength="8">
                <input type="password" name="cpass" id="cpass" placeholder="Confirm password">
                </div>
            </div>
            <button type="submit" value="submit" name="submit">Submit</button>
            <p class="dont">Already have an account ? <a class ="sign" href="login.php" >Login</a></p>
            <p class="tp">By signing the account, you agree to our <br><a href="terms.php"class="terms">Terms </a> and <a href="privacy.php" class="policy">Policies</a></p>
        </form>
    </div>
</body>

</html>