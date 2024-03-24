<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

$sqli= "SELECT * FROM users where uid='$id'";
$resul = mysqli_query($conn, $sqli);
$rows=mysqli_fetch_assoc($resul);
$uemail = $rows['email'];
$pass = $rows['pass'];
$phone = $rows['phone'];

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $nphone = $_POST['nphone'];
    $confirm = "UPDATE users SET phone='$nphone', email='$email', pass='$password' where uid='$id'";
    $result = mysqli_query($conn, $confirm);
    if($result){
        echo '<script> alert("Update Successful");
        document.location.href = "login.php";
        </script>';
    }
    else{
        echo '<script> alert("Update Failed"); </script>;';
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
        <form action="" method="POST" class="otp_for" autocomplete="off">
            <img src="rantel.png" alt="logo">
            <div class="top">
                <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
                <p class="ar">Admin Update</p>
            </div>
            <div class="msg">
                <p class="foremail">Please note that it will change the access data for the admin and you need to login again for security purpose.</p>
            </div>
            <div class="ib">
                <input type="text" name="email" value="<?php echo $uemail; ?>" placeholder="Enter your email" required>
                <input type="text" name="nphone" value="<?php echo $phone; ?>" placeholder="Enter your number" required >
                <input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Enter your password" required>
            </div>
            <div class="sub">
                <p class="last">Please click submit to change your details</p>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>