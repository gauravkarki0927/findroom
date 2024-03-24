<?php

include('connect.php');

session_start();
if(empty($_SESSION['email'])){
    header('Location:forget.php');
}

$verify= $_SESSION['emailvalidation'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$number =$_SESSION['number'];
$pass =$_SESSION['password'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $code =$_POST['code'];
    if($code==$verify){
        $sql = "INSERT INTO users (username, email, phone, pass) VALUES ('$name', '$email','$number', '$pass')";
        if ($conn->query($sql) === TRUE) {
            $date= "INSERT INTO register(email) VALUES('$email')";
            $check = mysqli_query($conn, $date);
            echo
                "
                <script>
                    alert('Your account has been created successfully');
                    document.location.href = 'login.php';
                </script>
                ";
        }
        else{
            $conn->close();
        }
    }
    else {
        echo "<script> alert('Verification CODE not matched!');</script>";
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
                <p class="ar">Email Validation</p>
            </div>
            <div class="msg">
                <p class="foremail">You can check your email that you provided during signup for validation CODE we sent</p>
            </div>
            <div class="ib">
                <input type="text" name="code" inputmode="numeric" maxlength="6" required>
            </div>
            <div class="sub">
                <p class="last">Please click button on the right to submit</p>
                <button type="submit" value="submit">Signup</button>
            </div>
        </form>
    </div>
</body>
</html>