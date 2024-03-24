<?php

include('connect.php');


session_start();
$verify= $_SESSION['otp'];
$email = $_SESSION['email'];
if(empty($_SESSION['email'])){
    header('Location:forget.php');
}


if($_SERVER['REQUEST_METHOD']=='POST'){

    $code =$_POST['code'];
            if($code==$verify)
            {
                echo "<script>alert('Your OTP is verified');
                document.location.href = 'newpass.php';
                </script>";
            }
            else{
                echo "
                <script>alert('The given OTP is invalid!');
                document.location.href = 'otp.php';
                </script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Recovery</title>
    <link rel="stylesheet" href="otp.css">
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
                <p class="foremail">You can check your email that you provided during signup for one time password we sent</p>
            </div>
            <div class="ib">
                <input type="text" name="code" inputmode="numeric" maxlength="6" min="0" max="9" required>
            </div>
            <div class="sub">
                <p class="last">Please click button on the right to submit your OTP</p>
                <button type="submit" value="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>