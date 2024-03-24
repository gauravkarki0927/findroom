<?php

include('connect.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "findroom";
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass =$_POST['pass'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, pass) VALUES ('$name', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Registration Successful');</script>";
        header('location:admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <!-- <link rel="stylesheet" href="create.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    height: 450px;
    transform: translate(-50%, -50%);
    box-shadow: 25px 30px 55px rgba(244, 245, 245, 0.607);
    border: 1px solid #dadce0;
    border-radius: 8px;
    padding: 12px 18px;
}
.box form{
    display: block;
}
.box .top {
    margin-top: 20px;
    width: 100%;
    height: 40px;
    text-align: center;
}

.box img {
    width: 130px;
}
.box i{
    position: absolute;
    top:12px;
    left:42%;
    font-size: 42px;
    color:rgba(22, 17, 104, 0.741);
}
.box .top .ar {
    font-size: 28px;
    font-weight: 600;
    color: rgba(0, 184, 120, 0.946);
}

.box .msg {
    margin-top: 6%;
    padding: 0 28px;
    font-size: 13px;
}

.box .msg .foremail {
    margin: auto;
}
.box input[type=text], input[type=password] {
    display: block;
    width: 80%;
    height: 42px;
    outline: none;
    border-radius: 4px;
    border: 1px solid #dadce0;
    text-align: center;
    padding: 8px 12px;
    margin: auto;
    margin-top: 10px;
}

::placeholder {
    font-size: 16px;
    text-align: center;
}

.box input[type=text]:hover,input[type=password]:hover {
    border: 2px solid rgba(0, 0, 255, 0.594);
}

.box .btn{
    display: flex;
    margin-left: 25%;
}
.box button {
    margin-left: 18px;
    margin-top: 4%;
    height: 32px;
    border-radius: 4px;
    border: none;
    background: rgb(23, 118, 243);
    outline: none;
    color: #fff;
    padding: 4px 12px;
    cursor: pointer;
}
.box .cnc{
    background:rgba(255, 0, 0, 0.893);
}
.box .cnc a{
    text-decoration: none;
    color:#fff;
}
.box form button:hover {
    background: rgb(15, 102, 215);
}
.box form .cnc:hover {
    background: rgb(215, 2, 2);
}
</style>
</head>

<body>
    <div class="box">
        <form method="POST" autocomplete="off" autosuggestion="off">
            <img src="rantel.png" alt="logo">
            <i class="fa-solid fa-user-plus"></i>
            <div class="top">
                <p class="ar">Register User</p>
            </div>
            <div class="msg">
                <p class="foremail">Fill up the user details correctly to create account for Web-Portal</p>
            </div>
            <input type="text" name="name" placeholder="Enter username" required>
            <input type="text" name="email" placeholder="Enter user email" required>
            <input type="password" name="pass" id="pass" placeholder="Enter user password" required>
            <input type="password" id="cpass" placeholder="Confirm user password" required>
            <div class="btn">
                <button class="crt" type="submit" value="submit">Create</button>
                <button class="cnc"><a href="admin.php">Cancel</a></button>
            </div>
        </form>
    </div>
</body>
</html>