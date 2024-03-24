<?php

include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <nav>
        <div class="logo">
            <p class="h">f!nd<span>Room</span><span class="nep">.com</span></p>
        </div>
        <div class="let">
            <ul class="pc">
                <li><a href="index.php">Homepage</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>
    <section id="front">
        <div class="overlay">
            <div class="message">
                <span class="f">THE SIMPLEST WEB PLATFORM...</span>
                <p class="g">...where you can create multiple post for your empty room and search rooms available around you from different places of the world. We help you to make your works easier and faster.</p>
                <ul>
                    <li><a class="sm" href="#cont"><span></span>See more..</a></li>
                    <li><a classs="or" href="#"><span></span>Our reviews</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="box" id="cont">
        <table class="cont">
            <tbody class="cards">
                <?php
                    $query = "SELECT * FROM userpost where admin_approval=1 && deal=0 ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $pid=$row['pid'];
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
                                                <div class='img'>
                                                <img src='".$image."' width='280px' height='200px'>
                                                </div>
                                                <div class='des'>
                                                <a class='visit' href='postdetails.php?pid=".$pid."'><i class='fa-solid fa-link'></i>Visit</a><br>Rs.$price<br>".$street."-".$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <button><a href='login.php'>Make a deal</a></button>
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
    <?php include('footer.php'); ?>
</body>

</html>