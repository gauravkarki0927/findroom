<?php
session_start();
// $id= $_SESSION['users'];
// if(empty($_SESSION['users'])){
//     header('Location:login.php');
// }
include('connect.php');
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $sqli= "SELECT * FROM userpost where pid='$pid'";
    $resul = mysqli_query($conn, $sqli);
    $rows=mysqli_fetch_assoc($resul);
    $uprice =$rows['price'];
    $uarea = $rows['street'];
    $uwd =$rows['ward'];
    $uct = $rows['city'];
    $udist = $rows['district'];
    $ust =$rows['states'];
    $uctry =$rows['country'];
    $uinfo =$rows['details'];
    $created =$rows['created'];
    $folder =$rows['images'];
    $sql ="SELECT userid from userpost WHERE pid='$pid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $dealerid = $row['userid'];
    $sql2 ="SELECT username from users WHERE uid='$dealerid'";
    $result2=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $dealername = $row['username'];
    $upperCaseString = strtoupper($dealername);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post details</title>
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: rgba(0,0,0,0.7) url(<?php echo $folder;?>) no-repeat;
            background-blend-mode: darken;
            background-position: center;
            background-size: cover;
            width:100%;
            background-attachment:fixed;
        }

        .main {
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            padding:20px;
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

        .main .top .ar {
            font-size: 28px;
        }

        .post {
            max-width: 80%;
            margin: 20px auto;
            display: flex;
            justify-content: space-around;
            padding: 4px;
        }

        .post p {
            font-size: 14px;
        }

        .post .left{
            width:50%;
            position:relative;
            z-index: 1;
        }

        .post .left img {
            width: 100%;
            height:422px;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            transition:0.5s;
        }

        .post .left img:hover{
            transform:scale(1.3);
            z-index: 2;
        }

        .post .right {
            width:50%;
            height:480px;
        }
        .post .right h4{
            padding: 12px 0;
        }
        .post .right .inside{
            background:#fff;
            width: 65%;
            padding:36px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            position:relative;
        }
        .post .right .inside #close{
            position:absolute;
            top:12px;
            right:12px;
            color:rgb(187, 19, 19);
            border:1px solid #fff;
            padding:0 4px;
            border-radius:2px;
            cursor:pointer;
        }
        .post .right .inside #close:hover{
            color:rgb(153, 13, 13);
            border:1px solid rgb(211, 202, 202);
        }
        .post .right h4 i{
            margin-right: 4px;
            background: rgb(134, 191, 209);
            padding:8px;
            border-radius: 50%;
        }
        span{
            color:rgb(212, 76, 7);
        }
        .post .right .details{
            padding:4px;
        }
        .post .right .details p{
            padding:2px;
        }
        .post .right .details .pp{
            width:100%;
            font-size:18px;
            font-weight:600;
            font-style:arial;
        }
        .post .right .details p i{
            font-size: 18px;
            color:rgb(25, 207, 25);
            padding:4px;
        }

        @media (max-width: 1117px) {
            .main {
                padding: 10px;
            }

            .text p {
                font-size: 14px;
            }
            .post .right .details{
                width:100%;
            }
        }
        @media (max-width: 1073px) {
            .post{
                display:flex;
                flex-direction:column;
                font-size:16px;
                color:#000;
                font-weight:500;
            }
            .post .left{
                width:100%;
                /* height:194px; */
                padding:0;
                height:50%;
            }
            .post .right{
                width:100%;
                height:50%;
                /* height:100px; */
            }
            .post .right .inside{
                width:100%;
                padding:18px 16px;
            }
        }
    </style>
        <script>
        function cancel() {
            let a = document.getElementById('post_det');
            let b = document.querySelector('body');
            let c = document.getElementById('main');
            if (onclick = true) {
                a.style.display = "none";
                c.style.display = "none";
                b.style.backgroundImage = "url(<?php echo $folder;?>) no-repeat";
                b.style.backgroundBlendMode= "normal";
            }
        }
    </script>
</head>

<body>
    <div class="main" id="main">
        <div class="top">
            <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
    </div>
    <div class="post" id="post_det">
        <div class="left">
            <img src="<?php
            echo $folder;
            ?>
            " alt="image.jpg">
        </div>
        <div class="right">
            <div class="inside">
            <i id="close" class="fa-solid fa-times close-icon" onclick="cancel()"></i>
            <h4><i class="fa-regular fa-user"></i><span><?php echo $upperCaseString ?> </span>created a post</h4>
            <div class="details">
                <p>Postid: <?php echo $pid; ?></p>
                <p>Area: <?php echo $uarea; ?></p>
                <p>Wardno: <?php echo $uwd; ?></p>
                <p>City/village: <?php echo $uct; ?></p>
                <p>District: <?php echo $udist; ?></p>
                <p>State: <?php echo $ust; ?></p>
                <p>Country: <?php echo $uctry; ?></p>
                <p>Created date: <?php echo $created; ?></p>
                <p>Post Approve: <i class='fa-solid fa-check'></i>Checked</p>
                <p>Post details: <?php echo $uinfo; ?></p>
                <p class="pp">Price: Rs.<?php echo $uprice; ?></p>
            </div>
            </div>
        </div>
    </div>
</body>

</html>