<?php
include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:userdash.php');
}
if(isset($_GET['usersid'])){
    $id=$_GET['usersid'];
    $sql = "SELECT * FROM users WHERE uid='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $name=$row['username'];
        $email =$row['email'];
        $phone =$row['phone'];
        $city =$row['city'];
        $state =$row['state'];
        $country =$row['country'];
        $martial =$row['martial'];
        $gender =$row['gender'];
        $image=$row['uprofile'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="userprofile.css">
  <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>
    <script type="text/javascript">
        function confirmation(id){
        sts = confirm("Are you sure you want to delete the post?");
        if(sts){
            document.location.href=`mypostdelete.php?pdata=${id}`;
            return true;
        }
        }
        </script>
</head>
<body>
    <div class="main">
        <div class="top">
            <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
    </div>
    <div class="box">
    <div class="my-responsive-div">
        <div class="inner1">
          <div class="image-file">
            <img src="<?php echo $image; ?>" alt="user">
          </div>
        </div>
        <div class="inner2">
          <div class="top">
            <h2><?php echo $name; ?></h2>
            <p class="email"><?php echo $email; ?></p>
            <ul class="uad">
              <li><?php echo $city; ?></li>
              <li><?php echo $state; ?></li>
              <li><?php echo $country; ?></li>
            </ul>
          </div>
          <div class="details">
          <ul class="det">
              <li>Martial<p class="result"><?php echo $martial; ?></p></li>
              <li>Gender<p class="result"><?php echo $gender; ?></p></li>
              <li>Number<p class="result"><?php echo $phone; ?></p></li>
            </ul>
          </div>
          <div class="count">
            <ul class="pdls">
              <li>Total post<p class="ttl">100</p></li>
              <li>Deal In<p class="ttl">10</p></li>
              <li>Deal Out<p class="ttl">20</p></li>
            </ul>
          </div>
        </div>
    </div>
    <div class="post">
    <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Total Post</a></li>
                <li><a href="#tabs-2">Deal Out</a></li>
                <li><a href="#tabs-3">Deal In</a></li>
                <li><a href="#tabs-4">Closed Deal</a></li>
            </ul>
            <div id="tabs-1">
                <div class="box" id="cont">
                    <table class="cont">
                        <tbody class="cards">
                            <?php
                    $query = "SELECT * FROM userpost where admin_approval=1 and userid='$id' and successful=0 ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $tp=$row['pid'];
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
                                                <br><p>Rs.".$price."</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <button><a href='aedit.php?pdata=".$tp."'>Update</a></button>
                                                <button id='btn2'><a href='javascript:void()' onclick='confirmation($tp)'>Delete</a></button>
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
            <div id="tabs-2">
                <div class="box" id="cont">
                    <table class="cont">
                        <tbody class="cards">
                            <?php
                    $query = "SELECT * FROM userpost where deal=1 and dealerid='$id' and successful=0 ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $buy=$row['pid'];
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
                                                <br><p>Rs.".$price."</p>".$street." ".$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <button id='b1'><i class='fa-solid fa-check'></i>Pending</button>
                                                <button id='b2'><a href='cancel.php?pdata=".$buy."'><i class='fa-solid fa-xmark'></i>Cancel</a></button>
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
            <div id="tabs-3">
                <div class="box" id="cont">
                    <table class="cont">
                        <tbody class="cards">
                            <?php
                    $query = "SELECT * FROM userpost where deal=1 and userid='$id' and successful=0 ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $sell=$row['pid'];
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
                                                <br><p>Rs.".$price."</p>".$street." ".$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <div class='changable' id='cbutt'>
                                                <button id='b1' onclick='newf()'><a href='confirmdeal.php?pdata=".$sell."'><i class='fa-solid fa-check'></i>Accept</a></button>
                                                <button id='b2'><a href='cancel.php?pdata=".$sell."'><i class='fa-solid fa-xmark'></i>Reject</a></button></div>
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
            <div id="tabs-4">
                <div class="box" id="cont">
                    <table class="cont">
                        <tbody class="cards">
                            <?php
                    $query = "SELECT * FROM userpost where (userid='$id' or dealerid='$id') and successful=1 ORDER BY pid DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $sell=$row['pid'];
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
                                                <br><p>Rs.".$price."</p>".$street." ".$ward." ".$city."<br>".$district.", ".$country."<br>
                                                <button id='b1'><i class='fa-solid fa-check'></i>Accepted</a></button>
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
        </div>
    </div>
    </div>
</body>
</html>