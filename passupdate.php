<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

if(isset($_POST['submit'])){

    $email =$_POST['email'];
    $pass =$_POST['pass'];
    $newpass =$_POST['npass'];

    $confirm = "UPDATE users SET pass='$nwepass' WHERE email='$email' and pass='$pass'";
    $result = mysqli_query($conn, $confirm);
    if($result){
        echo '<script> alert("Password Update Successful");
        document.location.href = "setting.php";
        </script>';
    }
    else{
        echo '<script> alert("Password Update Failed"); </script>;';
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
                <p class="ar">Update Password </p>
            </div>
            <div class="msg">
                <p class="foremail">Please note that your password will be changed if your account is verified.</p>
            </div>
            <div class="ib">
                <input type="text" name="email" placeholder="Enter your email" required>
                <input type="password" name="pass"  placeholder="Enter your old password" required>
                <input type="password" name="npass"  placeholder="Enter your new password" required>
            </div>
            <div class="sub">
                <p class="last">Please click submit to change your email</p>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>