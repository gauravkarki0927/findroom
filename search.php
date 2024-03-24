<?php
include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Navigation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Find<span class="nep">Room</span><span class="com">.com</span></label></label>
        <a class="home" href="userdash.php"><i class="fa-solid fa-house"></i>Home</a>
        <div class="bton">
            <form method="POST">
                <input type="text" name="search" placeholder="Search..." required>
                <button class="src" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <ul class="list">
            <li><a class="active" href="userprofile.php"><i class="fa-solid fa-user"></i>User</a></li>
            <li><a href="userpost.php"><i class="fa-solid fa-pen-to-square"></i>Post</a></li>
            <li><a href="help.php"><i class="fa-solid fa-circle-question"></i>Help</a></li>
            <li><a href="setting.php"><i class="fa-solid fa-gear"></i>Setting</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a></li>
        </ul>
    </nav>
    <div class="filter">
        <div class="fl">
            <form action="" method="GET">
                <select name="place" required>
                    <option value="" disabled selected>Select Place</option>
                    <option value="Butwal" <?=isset($_GET['place'])==true ? ($_GET['place']=='Butwal' ? 'selected' :'')
                        :'' ?>
                        >Butwal</option>
                    <option value="Kathmandu" <?=isset($_GET['place'])==true ? ($_GET['place']=='Kathmandu' ? 'selected'
                        :'') :'' ?>
                        >Kathmandu</option>
                    <option value="Pokhara" <?=isset($_GET['place'])==true ? ($_GET['place']=='Pokhara' ? 'selected'
                        :'') :'' ?>
                        >Pokhara</option>
                    <option value="Bhairahawa" <?=isset($_GET['place'])==true ? ($_GET['place']=='Bhairahawa'
                        ? 'selected' :'') :'' ?>
                        >Bhairahawa</option>
                    <option value="Divertole" <?=isset($_GET['place'])==true ? ($_GET['place']=='Divertole' ? 'selected'
                        :'') :'' ?>
                        >Divertole</option>
                    <option value="Traffic Chwok" <?=isset($_GET['place'])==true ? ($_GET['place']=='Traffic Chwok'
                        ? 'selected' :'') :'' ?>
                        >Traffic Chwok</option>
                    <option value="Biratnagar" <?=isset($_GET['place'])==true ? ($_GET['place']=='Biratnagar'
                        ? 'selected' :'') :'' ?>
                        >Biratnagar</option>
                    <option value="Dhankuta" <?=isset($_GET['place'])==true ? ($_GET['place']=='Dhankuta' ? 'selected'
                        :'') :'' ?>
                        >Dhankuta</option>
                    <option value="Banganga" <?=isset($_GET['place'])==true ? ($_GET['place']=='Banganga' ? 'selected'
                        :'') :'' ?>
                        >Banganga</option>
                    <option value="Manigram" <?=isset($_GET['place'])==true ? ($_GET['place']=='Manigram' ? 'selected'
                        :'') :'' ?>
                        >Manigram</option>
                    <option value="Deukhuri" <?=isset($_GET['place'])==true ? ($_GET['place']=='Deukhuri' ? 'selected'
                        :'') :'' ?>
                        >Deukhuri</option>
                    <option value="Milanchwok" <?=isset($_GET['place'])==true ? ($_GET['place']=='Milanchwok'
                        ? 'selected' :'') :'' ?>
                        >Milanchwok</option>
                    <option value="Lalitpur" <?=isset($_GET['place'])==true ? ($_GET['place']=='Lalitpur' ? 'selected'
                        :'') :'' ?>
                        >Lalitpur</option>
                    <option value="Biratnagar" <?=isset($_GET['place'])==true ? ($_GET['place']=='Biratnagar'
                        ? 'selected' :'') :'' ?>
                        >Biratnagar</option>
                    <option value="Kapilvastu" <?=isset($_GET['place'])==true ? ($_GET['place']=='Kapilvastu'
                        ? 'selected' :'') :'' ?>
                        >Kapilvastu</option>
                </select>
                <select name="price" required>
                    <option value="" disabled selected>Select Price</option>
                    <option value="5000" <?=isset($_GET['price'])==true ? ($_GET['price']=='5000' ? 'selected' :'') :''
                        ?>
                        >5000</option>
                    <option value="6000" <?=isset($_GET['price'])==true ? ($_GET['price']=='6000' ? 'selected' :'') :''
                        ?>
                        >6000</option>
                    <option value="9000" <?=isset($_GET['price'])==true ? ($_GET['price']=='9000' ? 'selected' :'') :''
                        ?>
                        >9000</option>
                    <option value="10000" <?=isset($_GET['price'])==true ? ($_GET['price']=='10000' ? 'selected' :'')
                        :'' ?>
                        >10000</option>
                    <option value="11000" <?=isset($_GET['price'])==true ? ($_GET['price']=='11000' ? 'selected' :'')
                        :'' ?>
                        >10000+</option>
                </select>
                <button class="filt" type="submit">Filter</button>
            </form>
        </div>
    </div>
    <div class="search" id="search">
        <table class="cont">
            <tbody class="cards">
                <?php

                if(isset($_POST['submit'])){
                    $data =$_POST['search'];
                    $qry = "SELECT * FROM userpost where userid!='$id' && admin_approval=1 && deal=0 && CONCAT(street, city, district, country) LIKE '%$data%'";
                    $result = mysqli_query($conn, $qry);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
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
                                        <div class='wrapper'>
                                        <div class='img'>
                                        <img src='".$image."' width='280px' height='200px'>
                                        <div class='vi'><a href='postdetails.php?pid=".$pid."'><i class='fa-solid fa-link'></i>Visit</a></div>
                                        </div>
                                        </div>
                                        <div class='des'>
                                        <br><p>Rs.".$price."</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br>
                                        <button class='btn3'><a href='dealbox.php?db=".$pid."'>Make a deal</a></button>
                                        </div>
                                    </div>
                                        </td>
                                    </tr>";
                                }
                            }
                        }
                        else if(isset($_GET['place']) && (!empty($_GET['place'])) && isset($_GET['price']) && (!empty($_GET['price']))){
                            $filterplace= $_GET['place'];
                            $filterprice= $_GET['price'];
                            if($filterprice !=11000){
                                $sql = "SELECT * FROM userpost WHERE userid!='$id' && admin_approval=1 && deal=0 && price <='$filterprice' AND CONCAT(street, city, district, country) LIKE '%$filterplace%'";
                                $res = mysqli_query($conn, $sql);
                                    if($res){
                                        while($row=mysqli_fetch_assoc($res)){
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
                                                    <div class='wrapper'>
                                                    <div class='img'>
                                                    <img src='".$image."' width='280px' height='200px'>
                                                    <div class='vi'><a href='postdetails.php?pid=".$pid."'><i class='fa-solid fa-link'></i>Visit</a></div>
                                                    </div>
                                                    </div>
                                                    <div class='des'>
                                                    <br><p>Rs.".$price."</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br>
                                                    <button class='btn3'><a href='dealbox.php?db=".$pid."'>Make a deal</a></button>
                                                    </div>
                                                </div>
                                                    </td>
                                                </tr>";
                                            }
                                        }
                            }

                                    else{
                                        $sql = "SELECT * FROM userpost WHERE userid!='$id' && admin_approval=1 && deal=0 && price>10000 AND CONCAT(street, city, district, country) LIKE '%$filterplace%'";
                                        $res = mysqli_query($conn, $sql);
                                        if($res){
                                            while($row=mysqli_fetch_assoc($res)){
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
                                                                <br><p>Rs.$price</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br><button type='submit'>Make a deal</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";
                                                }
                                            }
                                        }
                        }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>