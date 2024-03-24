
<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}
if(isset($_GET['usersid'])){
    $userid=$_GET['usersid'];

    $query = "SELECT * FROM users WHERE uid='$userid'";
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
    <style>
        .main {
            max-width: 100%;
            margin: 0 auto;
            border-bottom: 2px solid rgb(232, 224, 224);
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .main .top .hs {
            color: rgb(224, 63, 63);
            font-size: 32px;
        }

        .main .top .hs span {
            color: rgb(3, 64, 209);
            font-size: 32px;
        }

        .main .top .hs .nep {
            color: rgb(11, 207, 40);
            font-size: 24px;
            line-height: 30px;
        }
        </style>
</head>

<body>
    <div class="main">
        <div class="top">
            <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
    </div>
    <div class="box">
        <div class="left">
            <div class="top">
                <div class="image">
                    <?php
                    echo '<img src="'.$image.'" width="280px" height="200px">';
                    ?>
                </div>
                <h3><?php echo $uname; ?></h3>
            </div>
            <div class="rs">
                <p>Relation Status:</p>
                <p id="for">-><?php echo $martial; ?></p>
            </div>
            <div class="gender">
                <p>Gender:</p>
                <p id="for">-><?php echo $gender; ?></p>
            </div>
            <div class="sm">
                <p>Social Media:</p>
                <div class="an">
                <?php echo $sm1; ?>
                </div>
            </div>
            <div class="ow">
                <p>Other websites:</p>
                <div class="an">
                <?php echo $sm2; ?>
                </div>
            </div>
            <div class="prof">
                <p>Profession:</p>
                <div class="an">
                <?php echo $prof; ?>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="heading">
                <h2>User details</h2>
                <div class="create" id="create">
                    <button><?php echo'<a href="auseredit.php?uid='.$userid.'">'?><i class="fa-solid fa-pen"></i>Edit</a></button>
                </div>
            </div>
            <div class="center">
                <div class="first">
                    <div class="uname">
                        <p>Username:</p>
                        <div class="un">
                        <?php echo $uname; ?>
                        </div>
                    </div>
                    <div class="email">
                        <p>Email:</p>
                        <div class="un">
                        <?php echo $uemail; ?>
                        </div>
                    </div>
                    <div class="phone">
                        <p>Phone:</p>
                        <div class="un">
                        <?php echo $phone; ?>
                        </div>
                    </div>
                </div>
                <div class="second">
                    <div class="date">
                        <p>Date of birth:</p>
                        <div class="un">
                        <?php echo $dob; ?>
                        </div>
                    </div>
                    <div class="address">
                        <p>Address:</p>
                        <div class="un">
                        <?php echo $city.' '.$state.' '.$country; ?>
                        </div>
                    </div>
                    <div class="postal">
                        <p>Postal:</p>
                        <div class="un">
                        <?php echo $postal; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="below">
                <?php echo $desc; ?>
            </div>
        </div>
    </div>
</body>

</html>