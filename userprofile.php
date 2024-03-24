<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

    $query = "SELECT * FROM users WHERE uid='$id'";
    $result = mysqli_query($conn, $query);
        if($result){
            $row=mysqli_fetch_assoc($result);
            $dob=$row['dob'];
            $country=$row['country'];
            $state=$row['state'];
            $city=$row['city'];
            $postal=$row['postal'];
            $uname=$row['username'];
            $uemail=$row['email'];
            $phone=$row['phone'];
            $desc=$row['descr'];
            $martial=$row['martial'];
            $gender=$row['gender'];
            $sm1=$row['social'];
            $sm2=$row['social2'];
            $prof=$row['profession'];
            $image=$row['uprofile'];
}
else{
die(mysqli_error( $conn));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <div class="box">
        <div class="left">
            <div class="top">
                <div class="image">
                    <?php
                    echo '<img src="'.$image.'">';
                    ?>
                </div>
                <h3><?php echo $uname; ?></h3>
            </div>
            <div class="rs">
                <p class="lable">Relation Status:</p>
                <p id="for">-><?php echo $martial; ?></p>
            </div>
            <div class="gender">
                <p class="lable">Gender:</p>
                <p id="for">-><?php echo $gender; ?></p>
            </div>
            <div class="sm">
                <p class="lable">Social Media:</p>
                <div class="an">
                <?php echo $sm1; ?>
                </div>
            </div>
            <div class="ow">
                <p class="lable">Other websites:</p>
                <div class="an">
                <?php echo $sm2; ?>
                </div>
            </div>
            <div class="prof">
                <p class="lable">Profession:</p>
                <div class="an">
                <?php echo $prof; ?>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="heading">
                <h2>User details</h2>
                <div class="create" id="create">
                    <button><a href="newpe.php"><i class="fa-solid fa-pen"></i>Edit</a></button>
                </div>
            </div>
            <div class="center">
                <div class="first">
                    <div class="uname">
                        <p class="lable">Username:</p>
                        <div class="un">
                        <p class="hero"><?php echo $uname; ?></p>
                        </div>
                    </div>
                    <div class="email">
                        <p class="lable">Email:</p>
                        <div class="un">
                        <p class="hero"><?php echo $uemail; ?></p>
                        </div>
                    </div>
                    <div class="phone">
                        <p class="lable">Phone:</p>
                        <div class="un">
                        <p class="hero"><?php echo $phone; ?></p>
                        </div>
                    </div>
                </div>
                <div class="second">
                    <div class="date">
                        <p class="lable">Date of birth:</p>
                        <div class="un">
                        <p class="hero"><?php echo $dob; ?></p>
                        </div>
                    </div>
                    <div class="address">
                        <p class="lable">Address:</p>
                        <div class="un">
                        <p class="hero"><?php echo $city.' '.$state.' '.$country; ?></p>
                        </div>
                    </div>
                    <div class="postal">
                        <p class="lable">Postal:</p>
                        <div class="un">
                        <p class="hero"><?php echo $postal; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="below">
            <p class="hero"><?php echo $desc; ?></p>
            </div>
        </div>
    </div>
</body>

</html>