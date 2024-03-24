<?php
include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

$total = mysqli_query($conn, "SELECT COUNT(*) FROM users");
$trow = mysqli_fetch_array($total);
$total_rows = $trow[0]-1;

$totalp = mysqli_query($conn, "SELECT COUNT(*) FROM userpost");
$trowp = mysqli_fetch_array($totalp);
$total_rowsp = $trowp[0];


$totalsuspend = mysqli_query($conn, "SELECT COUNT(*) FROM users where Access=0");
$trow_suspend = mysqli_fetch_array($totalsuspend);
$total_rowsuspend = $trow_suspend[0];

$unapproved = mysqli_query($conn, "SELECT COUNT(*) FROM userpost where admin_approval=0");
$trow_unapproved = mysqli_fetch_array($unapproved);
$total_row = $trow_unapproved[0];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Users', 'Posts'],
          ['2021',  1000,      400],
          ['2022',  1170,      460],
          ['2023',  660,       1120],
          ['2024',  1030,      540]
        ]);

        var options = {
          title: 'System Overview',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        function dashboard() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (dash.style.display != 'block') {
                dash.style.display = 'block';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function analytic() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (analytic.style.display != 'block') {
                analytic.style.display = 'block';
                dash.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function users() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (users.style.display != 'block') {
                users.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function userpost() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (userpost.style.display != 'block') {
                userpost.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function suspend() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (suspend.style.display != 'block') {
                suspend.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function active() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (active.style.display != 'block') {
                active.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function register() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (regis.style.display != 'block') {
                regis.style.display = 'block';
                active.style.display = 'none';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                logged.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function log() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (logged.style.display != 'block') {
                logged.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                posted.style.display = 'none';
            }
        }

        function post() {
            var dash = document.getElementById('dash');
            var analytic = document.getElementById('analytic');
            var users = document.getElementById('users');
            var userpost = document.getElementById('userpost');
            var suspend = document.getElementById('suspend');
            var active = document.getElementById('active');
            var regis = document.getElementById('regis');
            var logged = document.getElementById('logged');
            var posted = document.getElementById('posted');
            if (posted.style.display != 'block') {
                posted.style.display = 'block';
                dash.style.display = 'none';
                analytic.style.display = 'none';
                users.style.display = 'none';
                userpost.style.display = 'none';
                suspend.style.display = 'none';
                active.style.display = 'none';
                regis.style.display = 'none';
                logged.style.display = 'none';
            }
        }
    </script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>
    <script type="text/javascript">
    function deleteuser(id){
    sts = confirm("Are you sure you want to delete this user?");
    if(sts){
        document.location.href=`adelete.php?data=${id}`;
        return true;
    }
    }
    </script>
    <script type="text/javascript">
    function deletepost(id){
    sts = confirm("Are you sure you want to delete this post?");
    if(sts){
        document.location.href=`dealbox.php?db=${id}`;
        return true;
    }
    }
    </script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2 class="website-name">Find<span>Room</span><span class="nep">.com</span></h2>
            <p class="nickname">Admin Panel</p>
            <ul class="lt">
                <li><i class="fa-solid fa-chart-line"></i><input type="button" value="Analytic" onclick="analytic()">
                </li>
                <li><i class="fa-regular fa-window-restore"></i><input type="button" value="Dashboard"
                        onclick="dashboard()"></li>
                <li><i class="fa-regular fa-user"></i><input type="button" value="User" onclick="users()"></li>
                <li><i class="fa-regular fa-clipboard"></i><input type="button" value="Post" onclick="userpost()"></li>
                <li><i class="fa-regular fa-hourglass-half"></i><input type="button" value="Suspend"
                        onclick="suspend()"></li>
                <li><i class="fa-regular fa-address-book"></i><input type="button" value="Active" onclick="active()">
                </li>
            </ul>
            <ul class="ua">
                <h3>User Activities</h3>
                <li><i class="fa-solid fa-bars-progress"></i><input type="button" value="Register history"
                        onclick="register()"></li>
                <li><i class="fa-solid fa-right-to-bracket"></i><input type="button" value="Log history"
                        onclick="log()"></li>
                <li><i class="fa-solid fa-image-portrait"></i><input type="button" value="Post history"
                        onclick="post()"></li>
            </ul>
            <ul class="al">
                <li><i class="fa-solid fa-user"></i><a href="account.php">Account</a></li>
                <li><i class="fa-solid fa-right-from-bracket"></i><a href="adminlogout.php">Logout</a></li>
            </ul>
        </div>
        <div class="right">
            <div class="content">
                <div class="header">
                    <div class="name">
                        <img src="rantel.png" alt="logo">
                        <h1>Rental Application</h1>
                    </div>
                    <div class="buttons">
                        <button class="button" id="list"><i class="fa-solid fa-pen"></i><a class="edit"
                                href="adminpedit.php">Edit</a></button>
                        <button class="button" id="listi"><i class="fa-solid fa-plus"></i><a class="create"
                                href="acreate.php">Create</a></button>
                        <button class="button" id="listii"><i class="fa-solid fa-gear"></i><a class="manage"
                                href="manage.php">Manage</a></button>
                    </div>
                </div>
                <div class="cards">
                    <div class="card">
                        <h3><?php
                        echo $total_rows;
                        ?></h3>
                        <p>Total User</p>
                        <div class="status">
                            <i class="fa-solid fa-arrow-up"></i><i class="fa-solid fa-arrow-down"></i><span>Since last
                                time</span>
                        </div>
                    </div>
                    <div class="card">
                        <h3><?php
                        echo $total_rowsp;
                       ?></h3>
                        <p>Total Post</p>
                        <div class="status">
                            <i class="fa-solid fa-arrow-up"></i><i class="fa-solid fa-arrow-down"></i><span>Since last
                                time</span>
                        </div>
                    </div>
                    <div class="card">
                        <h3><?php
                        echo $total_rowsuspend;
                       ?></h3>
                        <p>Suspended User</p>
                        <div class="status">
                            <i class="fa-solid fa-arrow-up"></i><i class="fa-solid fa-arrow-down"></i><span>Since last
                                time</span>
                        </div>
                    </div>
                    <div class="card">
                        <h3><?php
                        echo $total_row;
                       ?></h3>
                        <p>Unapproved Post</p>
                        <div class="status">
                            <i class="fa-solid fa-arrow-up"></i><i class="fa-solid fa-arrow-down"></i><span>Since last
                                time</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <p>Quicksearch</p>
                <form action="adminsearch.php" method="POST" autocomplete="off">
                    <div class="src">
                        <input type="text" name="data" placeholder="Search User">
                        <button name="srch" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <form action="adminsearchpost.php" method="POST" autocomplete="off">
                    <div class="src2">
                        <input type="text" name="pdata" placeholder="Search Post">
                        <button name="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="function">
                <div class="files" id="dash">
                    <table class="cont">
                            <thead>
                                <tr>
                                    <th>PID</th>
                                    <th>Image</th>
                                    <th>Approve</th>
                                    <th>Price</th>
                                    <th>Village</th>
                                    <th>Ward</th>
                                    <th>District</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Alter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            
                            $sql = "SELECT * FROM userpost where admin_approval=0";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $pid =$row['pid'];
                                    $image =$row['images'];
                                    $approve =$row['admin_approval'];
                                    $price =$row['price'];
                                    $area =$row['street'];
                                    $ward =$row['ward'];
                                    $district =$row['district'];
                                    $state =$row['states'];
                                    $country =$row['country'];
            
                                    echo"
                                    <tr>
                                        <th>".$pid."</th>
                                        <td><img src='".$image."' width='100px' height='60px'></td>
                                        <td>".$approve."</td>
                                        <td>".$price."</td>
                                        <td>".$area."</td>
                                        <td>".$ward."</td>
                                        <td>".$district."</td>
                                        <td>".$state."</td>
                                        <td>".$country."</td>
                                        <td><div class='abtn'>
                                        <button class='unb'><a href='approve.php?pid=".$pid."'>Approve</a></button>
                                        <button class='dlt'><a href='javascript:void()' onclick='deletepost($pid)'>Delete</a></button></div>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="analytic" id="analytic">
                        <div id="curve_chart" style="width: 1100px; height: 500px"></div>
                    </div>
    
                    <div class="users" id="users">
                        <table class="cont">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Access</th>
                                    <th>Alter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            
                            $sql = "SELECT * FROM users";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $uid =$row['uid'];
                                    $pass=$row['username'];
                                    $email =$row['email'];
                                    $phone =$row['phone'];
                                    $access =$row['Access'];
            
                                    echo"
                                    <tr>
                                        <th><a href='myprofile.php?usersid=".$uid."'>".$uid."</a></th>
                                        <td>".$pass."</td>
                                        <td>".$email."</td>
                                        <td>".$phone."</td>
                                        <td>".$access."</td>
                                        <td><div class='abtn'>
                                        <button><a href='block.php?uid=".$uid."'>Block</a></button>
                                        <button class='dlt'><a href='javascript:void()' onclick='deleteuser($uid)'>Delete</a></button></div>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="userpost" id="userpost">
                        <table class="cont">
                            <thead>
                                <tr>
                                    <th>PID</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Area</th>
                                    <th>Ward</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Alter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            
                            $sql = "SELECT * FROM userpost where admin_approval=1";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $pid =$row['pid'];
                                    $photo =$row['images'];
                                    $price =$row['price'];
                                    $street =$row['street'];
                                    $ward =$row['ward'];
                                    $city =$row['city'];
                                    $district =$row['district'];
                                    $states =$row['states'];
                                    $country =$row['country'];
            
                                    echo"
                                    <tr>
                                        <th><a href='postdetails.php?pid=".$pid."'>".$pid."</a></th>
                                        <td><img src='".$photo."' width='100px' height='60px'></td>
                                        <td>".$price."</td>
                                        <td>".$street."</td>
                                        <td>".$ward."</td>
                                        <td>".$city."</td>
                                        <td>".$district."</td>
                                        <td>".$states."</td>
                                        <td>".$country."</td>
                                        <td><div class='abtn'>
                                        <button><a href='aedit.php?pdata=".$pid."'>Edit</a></button>
                                        <button class='dlt'><a href='javascript:void()' onclick='deletepost($pid)'>Delete</a></button></div>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="suspend" id="suspend">
                        <table class="cont">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Access</th>
                                    <th>Alter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            
                            $sql = "SELECT * FROM users where Access=0";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $uid =$row['uid'];
                                    $name =$row['username'];
                                    $email =$row['email'];
                                    $access =$row['Access'];
                                    $phone =$row['phone'];
            
                                    echo"
                                    <tr>
                                    <th><a href='adminview.php?usersid=".$uid."'>".$uid."</a></th>
                                        <td>".$name."</td>
                                        <td>".$email."</td>
                                        <th>".$phone."</th>
                                        <td>".$access."</td>
                                        <td><div class='abtn'>
                                        <button class='unb'><a href='unblock.php?uid=".$uid."'>Unblock</a></button>
                                        </td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="active" id="active">
                        <table class="cont">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Access</th>
                                    <th>Alter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            
                            $sql = "SELECT * FROM users where Access=1";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $uid =$row['uid'];
                                    $name =$row['username'];
                                    $email =$row['email'];
                                    $access =$row['Access'];
                                    $phone =$row['phone'];
            
                                    echo"
                                    <tr>
                                        <th>".$uid."</th>
                                        <td>".$name."</td>
                                        <td>".$email."</td>
                                        <th>".$phone."</th>
                                        <td>".$access."</td>
                                        <td><div class='abtn'>
                                        <button><a href='auseredit.php?uid=".$uid."'>Edit</a></button>
                                        <button style='background:orange;'><a href='admin.php?uid=".$uid."' style='color:black;'>Admin</a></button>
                                        </td>
                                    </tr>";
                                }
                            }

                            if(isset($_GET['uid'])){
                                $admin=$_GET['uid'];
                                $sql= "UPDATE userpost SET utype='Admin' where uid='$admin'";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    header('Location:admin.php');
                                }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="register" id="regis">
                        <table class="cont">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Access</th>
                                    <th>Registered Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $sql ="SELECT uid, username, email, Access, record FROM users";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $uid =$row['uid'];
                                    $name =$row['username'];
                                    $email =$row['email'];
                                    $access =$row['Access'];
                                    $rec =$row['record'];
            
                                    echo"
                                    <tr>
                                        <th>".$uid."</th>
                                        <td>".$name."</td>
                                        <td>".$email."</td>
                                        <th>".$access."</th>
                                        <td>".$rec."</td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
    
                <div class="logged" id="logged">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Login</a></li>
                            <li><a href="#tabs-2">Logout</a></li>
                        </ul>
                        <div id="tabs-1">
                            <div class="userlog">
                                <table class="cont">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Logged In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $sql ="SELECT * from loginlink";
                                    $result = mysqli_query($conn, $sql);
                    
                                    if($result){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $uid =$row['userid'];
                                            $name =$row['username'];
                                            $email =$row['email'];
                                            $rec =$row['logindate'];
                    
                                            echo"
                                            <tr>
                                                <th>".$uid."</th>
                                                <td>".$name."</td>
                                                <td>".$email."</td>
                                                <td>".$rec."</td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="userlog">
                                <table class="cont">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Logged Out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $sql ="SELECT * from logoutlink";
                                    $result = mysqli_query($conn, $sql);
                    
                                    if($result){
                                        while($row=mysqli_fetch_assoc($result)){
                                            $uid =$row['userid'];
                                            $name =$row['username'];
                                            $email =$row['email'];
                                            $rec =$row['logoutdate'];
                    
                                            echo"
                                            <tr>
                                                <th>".$uid."</th>
                                                <td>".$name."</td>
                                                <td>".$email."</td>
                                                <td>".$rec."</td>
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
                    <div class="posted" id="posted">
                        <table class="cont">
                            <thead>
                                <tr>
                                   <th>ID</th>
                                   <th>UserID</th>
                                   <th>Email</th>
                                   <th>Access</th>
                                   <th>Creaed Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $sql ="SELECT pid, userid, useremail, admin_approval, created FROM userpost";
                            $result = mysqli_query($conn, $sql);
            
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $pid =$row['pid'];
                                    $name =$row['userid'];
                                    $email =$row['useremail'];
                                    $access =$row['admin_approval'];
                                    $rec =$row['created'];
            
                                    echo"
                                    <tr>
                                        <th>".$pid."</th>
                                        <td>".$name."</td>
                                        <td>".$email."</td>
                                        <th>".$access."</th>
                                        <td>".$rec."</td>
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
</body>

</html>