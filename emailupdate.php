<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nemail = $_POST['nemail'];
    $password = $_POST['pass'];
    $confirm = "UPDATE users SET email='$nemail' WHERE email='$email' and pass='$password'";
    $result = mysqli_query($conn, $confirm);
    if($result){
        echo '<script> alert("Email Update Successful");
        document.location.href = "setting.php";
        </script>';
    }
    else{
        echo '<script> alert("Email Update Failed"); </script>;';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Update</title>
    <link rel="stylesheet" href="newpass.css">
</head>
<body>
    <div class="box">
        <form action="" method="POST" class="otp_for" autocomplete="off" onsubmit="return pass()">
            <img src="rantel.png" alt="logo">
            <div class="top">
                <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
                <p class="ar">Update Email</p>
            </div>
            <div class="msg">
                <p class="foremail">Please note that your email will be changed if your account is verified</p>
            </div>
            <div class="ib">
                <input type="text" name="email" placeholder="Enter your old email" required>
                <input type="text" name="nemail" placeholder="Enter your new email" required>
                <input type="password" name="pass"  placeholder="Enter your password" required>
            </div>
            <div class="sub">
                <p class="last">Please click submit to change your email</p>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>