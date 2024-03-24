<?php

include('connect.php');
session_start();
$email= $_SESSION['email'];
if(empty($_SESSION['email'])){
    header('Location:otp.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    $email =$_POST['email'];
    $newpass =$_POST['newpass'];

    $sql ="SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $num =mysqli_num_rows($result);
        {
            if($num>0){
                $confirm = "UPDATE users SET pass='$newpass' where email='$email'";
                $set= mysqli_query($conn, $confirm);
                    if($set){
                        session_start();
                        $_POST['email']=$name;
                        echo "<script> alert('Password was successfully reset');</script>;";
                        header('Location:login.php');
                    }
                    else{
                        die("Error!");
                    }
                }
            else{
                echo "<script> alert('Invalid Email');</script>;";
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
    <title>Account Recovery</title>
    <link rel="stylesheet" href="newpass.css">
    <script>
        function pass(){
            var npass =document.getElementById('npass').value;
            var cpass =document.getElementById('cpass').value;
            if(npass != cpass){
                alert('Password not matched!');
                document.location.href = 'newpass.php';
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="box">
        <form action="" method="POST" class="otp_for" autocomplete="off" onsubmit="return pass()">
            <img src="rantel.png" alt="logo">
            <div class="top">
                <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
                <p class="ar">Account recovery</p>
            </div>
            <div class="msg">
                <p class="foremail">Please enter email and new password for your password recovery</p>
            </div>
            <div class="ib">
                <input type="text" name="email" placeholder="Enter your email" required>
                <input type="password" name="newpass" id="npass" placeholder="Enter your new password" required>
                <input type="password" id="cpass" placeholder="Confirm your new password" required>
            </div>
            <div class="sub">
                <p class="last">Please click submit to change your password</p>
                <button type="submit" value="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>