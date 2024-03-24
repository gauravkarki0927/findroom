<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}
$details ="SELECT * FROM users WHERE uid='$id'";
$test = mysqli_query($conn, $details);
$row=mysqli_fetch_assoc($test);
$_SESSION['username']= $row['username'];
$_SESSION['useremail']= $row['email'];
$_SESSION['userphone']= $row['phone'];


if(empty($_SESSION['users'])){
    header('Location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dash</title>
    <link rel="stylesheet" href="user.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function confirmation(id){
    sts = confirm("Are you sure you want to make a deal?");
    if(sts){
        document.location.href=`dealbox.php?db=${id}`;
        return true;
    }
    }
    </script>
</head>

<body>
        <div class="create" id="create">
            <button><a href="create.php">Create post </a></button>
            <button class="rev"><a href="userreview.php">Rate Us</a></button>
        </div>
        <div class="out">
        <div class="box" id="cont">
            <table class="cont">
                <tbody class="cards">
                    <?php
                    $query = "SELECT * FROM userpost where admin_approval=1 && deal=0 && userid!='$id' ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $pid=$row['pid'];
                                $_SESSION['postid']= $pid;
                                $price=$row['price'];
                                $image =$row['images'];
                                $street =$row['street'];
                                $ward =$row['ward'];
                                $city =$row['city'];
                                $district =$row['district'];
                                $country =$row['country'];
                                    echo "<tr>
                                        <td>
                                            <div class='post'>
                                                <div class='wrapper'>
                                                <div class='img'>
                                                <img src='".$image."' width='280px' height='200px'>
                                                <div class='vi'><a href='postdetails.php?pid=".$pid."'><i class='fa-solid fa-link'></i>Visit</a></div>
                                                </div>
                                                </div>
                                                <div class='des'>
                                                <br><p>Rs.".$price."</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <button class='btn3'><a href='javascript:void()' onclick='confirmation($pid)'>Make a deal</a></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>";
                                }
                            }
                        ?>
                </tbody>
            </table>
        </div>
        </div>
</body>

</html>