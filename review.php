<?php
include('connect.php');

$total = mysqli_query($conn, "SELECT COUNT(*) FROM users");
$trow = mysqli_fetch_array($total);
$row8 = $trow[0]-1;

$totalreview= mysqli_query($conn, "SELECT COUNT(*) from review");
$r1 = mysqli_fetch_array($totalreview);
$row1 = $r1[0];
$revadd = $row1*5;

$review1= mysqli_query($conn, "SELECT COUNT(*) from review WHERE ratings=1");
$r2 = mysqli_fetch_array($review1);
$row2 = $r2[0];

$review2= mysqli_query($conn, "SELECT COUNT(*) from review WHERE ratings=2");
$r3 = mysqli_fetch_array($review2);
$row3 = $r3[0];

$review3= mysqli_query($conn, "SELECT COUNT(*) from review WHERE ratings=3");
$r4 = mysqli_fetch_array($review3);
$row4 = $r4[0];

$review4= mysqli_query($conn, "SELECT COUNT(*) from review WHERE ratings=4");
$r5 = mysqli_fetch_array($review4);
$row5 = $r5[0];

$review5= mysqli_query($conn, "SELECT COUNT(*) from review WHERE ratings=5");
$r6 = mysqli_fetch_array($review5);
$row6 = $r6[0];

$review6= mysqli_query($conn, "SELECT AVG(ratings) from review");
$r7 = mysqli_fetch_array($review6);
$row7 =round($r7[0], 1);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dash</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="displayreview.css">
    <script>
        function searchclick() {
            let a = document.getElementById('search');
            let b = document.getElementById('cont');
            if (onclick = true) {
                b.style.display = "none";
                a.style.display = "block";
            }
            else{
                b.style.display = "block";
                a.style.display = "none";
            }
        }
    </script>
</head>

<body>
    <div class="info">
        <ul>
            <li>Contact: Divertole, 10 Rupandehi, Nepal</li>
            <li>Email: findroomnp@gmail.com</li>
            <li>Phone: 071-xxxxxxx</li>
            <li><span>&#169;</span> Copyright, findroom</li>
        </ul>
    </div>
    <div class="heading">
        <form action="" method="POST">
            <div class="src">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="userreview" placeholder="Search over a millions of user review...">
            </div>
            <button type="submit" onclick="searchclick()" name="submit">Search</button>
        </form>
    </div>
    <div class="total">
        <div class="ml1">
            <div class="starses">
                <h1><?php echo $row7; ?> <i class="fa-solid fa-star-half-stroke"></i></h1>
                <p class="pl1">Average rating based on <br> <?php echo $row1; ?> ratings</p>
                <span class="material-symbols-outlined">star_rate</span>
                <span class="material-symbols-outlined">star_rate</span>
                <span class="material-symbols-outlined">star_rate</span>
                <span class="material-symbols-outlined">star_rate</span>
                <span class="material-symbols-outlined">star_rate</span>
            </div>
        </div>
        <div class="ml2">
            <div class="ul1">
                <ul>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <p class="pl2">1.0</p>
                </ul>
                <input disabled type="box">
                <p class="pl3"><?php echo $row2; ?> Ratings</p>
            </div>
            <div class="ul2">
                <ul>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <p class="pl2">2.0</p>
                </ul>
                <input disabled type="box">
                <p class="pl3"><?php echo $row3; ?> Ratings</p>
            </div>
            <div class="ul3">
                <ul>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <p class="pl2">3.0</p>
                </ul>
                <input disabled type="box">
                <p class="pl3"><?php echo $row4; ?> Ratings</p>
            </div>
            <div class="ul4">
                <ul>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-regular fa-star" data-index="0"></i></li>
                <p class="pl2">4.0</p>
                </ul>
                <input disabled type="box">
                <p class="pl3"><?php echo $row5; ?> Ratings</p>
            </div>
            <div class="ul5">
                <ul>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <li><i class="fa-solid fa-star" data-index="0"></i></li>
                <p class="pl2">5.0</p>
                </ul>
                <input disabled type="box">
                <p class="pl3"><?php echo $row6; ?> Ratings</p>
            </div>
        </div>
        <div class="ml3">
            <button><a href="login.php">Give Reivew</a></button>
            <div class="tu">
            <p class="pl3">Total Users:</p>
            <h3><?php echo $row8; ?> </h3>
            </div>
            <div class="tr">
            <p class="pl4">Total Reviews:</p>
            <h3><?php echo $row1; ?> </h3>
            </div>
        </div>
    </div>
    <div class="out">
        <div class="left">
        </div>
        <div class="box">
        <table class="cont" id="search">
                <tbody class="cards">
                    <?php
                    if(isset($_POST['submit'])){
                        $data =$_POST['userreview'];
                        $query = "SELECT * FROM review WHERE username LIKE '%$data%' ORDER BY id DESC";
                        $rest = mysqli_query($conn, $query);
                            if($rest){
                                while($row=mysqli_fetch_assoc($rest)){
                                    $userid=$row['userid'];
                                    $date=$row['dates'];
                                    $ratings=$row['ratings'];
                                    $review=$row['review'];
                                 
                                    $sql = "SELECT * FROM users where uid='$userid'";
                                    $result = mysqli_query($conn, $sql);
                                        if($result)
                                            $row=mysqli_fetch_assoc($result);
                                            $image =$row['uprofile'];
                                            $username=$row['username'];
                                        echo "<tr>
                                            <td>
                                                <div class='post'>
                                                    <div class='header'>
                                                        <img src='".$image."'>
                                                        <div class='tl'>
                                                        <h3>".$username."</h3>
                                                        <p class='date'>".$date."</p>
                                                        </div>
                                                        <div class='rate'>
                                                        <p class='count'>".$ratings."/5</p>
                                                        <i class='fa-solid fa-star'></i>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class='des'>
                                                    <p class='msg'>".$review."</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>";
                                    }
                                }
                            }
                        ?>
                </tbody>
            </table>
            
            <table class="cont" id="cont">
                <tbody class="cards">
                    <?php
                    $query = "SELECT * FROM review ORDER BY id DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $userid=$row['userid'];
                                $username=$row['username'];
                                $image =$row['profiles'];
                                $date=$row['dates'];
                                $ratings=$row['ratings'];
                                $review=$row['review'];
                         
                                    echo "<tr>
                                        <td>
                                            <div class='post'>
                                                <div class='header'>
                                                    <img src='".$image."'>
                                                    <div class='tl'>
                                                    <h3>".$username."</h3>
                                                    <p class='date'>".$date."</p>
                                                    </div>
                                                    <div class='rate'>
                                                    <p class='count'>".$ratings."/5</p>
                                                    <i class='fa-solid fa-star'></i>
                                                </div>
                                                </div>
                                                
                                                <div class='des'>
                                                <p class='msg'>".$review."</p>
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
        <div class="right">

        </div>
    </div>
</body>
</html>