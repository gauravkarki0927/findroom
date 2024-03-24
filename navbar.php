<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Navigation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">f!nd<span class="nep">Room</span><span class="com">.com</span></label></label>
        <a class="home" href="userdash.php"><i class="fa-solid fa-house"></i>Home</a>
        <button class="bton"><a href="search.php">Go to Search<i class="fa-solid fa-magnifying-glass"></i></a></button>
        <ul class="list">
            <li><a class="active" href="userprofile.php"><i class="fa-solid fa-user"></i>User</a></li>
            <li><a href="userpost.php"><i class="fa-solid fa-pen-to-square"></i>Post</a></li>
            <li><a href="help.php"><i class="fa-solid fa-circle-question"></i>Help</a></li>
            <li><a href="setting.php"><i class="fa-solid fa-gear"></i>Setting</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
        </ul>
    </nav>
</body>
</html>