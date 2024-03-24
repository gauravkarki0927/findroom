<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Search</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

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

        .function {
            width: 100%;
        }

        .users {
            justify-content: center;
            display: flex;
        }

        .users .cont tbody tr td .abtn button {
            padding: 4px;
            cursor: pointer;
            border: none;
            outline: none;
            background: red;
            border-radius: 4px;
            width: 50px;
            color: #efe9e9e4;
            margin: 0px 4px;
        }

        .users .cont tbody tr td .abtn .edit {
            background: green;
        }

        .users .cont tbody tr td .abtn .blk {
            background: rgb(128, 0, 0);
        }

        .users .cont tbody tr td .abtn {
            display: flex;
        }

        .users .cont tbody tr {
            border-bottom: 1px solid #42414147;
            border-radius: 4px;
        }

        .users .cont tbody tr {
            font-size: 14px;
        }

        .users .cont th,
        .users .cont td {
            padding: 8px;
            text-align: center;
        }

        .users .cont thead tr {
            background: rgba(160, 207, 89, 0.445);
        }

        .users .cont {
            width: 80%;
            border-collapse: collapse;
            margin: 12px 0;
            flex-wrap: wrap;
        }

        .users .cont tbody tr td .abtn button a {
            text-decoration: none;
            color: #efe9e9e4;
        }
    </style>
    <script type="text/javascript">
    function confirmation(id){
    sts = confirm("Are you sure you want to delete this post?");
    if(sts){
        document.location.href=`postdelete.php?pdata=${id}`;
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
    <div class="function">
        <div class="users" id="users">
            <table class="cont">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>UserID</th>
                        <th>Created</th>
                        <th>Price</th>
                        <th>Street</th>
                        <th>Ward</th>
                        <th>District</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Alter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['search'])){
                        $data=$_POST['pdata'];
                        $sqli = "SELECT * FROM userpost where userid LIKE '%$data%' or useremail LIKE '%$data%' or street LIKE '%$data%' or district LIKE '%$data%' or city LIKE '%$data%' or states LIKE '%$data%' or country LIKE '%$data%' or price LIKE '%$data%' ";
                        $result = mysqli_query($conn, $sqli);
    
                    if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $pid =$row['pid'];
                        $posterid=$row['userid'];
                        $price =$row['price'];
                        $image =$row['images'];
                        $street =$row['street'];
                        $ward =$row['ward'];
                        $city =$row['city'];
                        $district =$row['district'];
                        $states =$row['states'];
                        $country =$row['country'];
                        $created =$row['created'];
    
                        echo"
                        <tr>
                            <th><a href='postdetails.php?pid=".$pid."'>".$pid."</a></th>
                            <td><img src='".$image."' width='100px' height='60px'></td>
                            <th><a href='adminview.php?usersid=".$posterid."'>".$posterid."</a></th>
                            <td>".$created."</td>
                            <td>".$price."</td>
                            <td>".$street."</td>
                            <td>".$ward."</td>
                            <td>".$city."</td>
                            <td>".$district."</td>
                            <td>".$states."</td>
                            <td>".$country."</td>
                            <td><div class='abtn'>
                            <button class='edit'><a href='aedit.php?pdata=".$pid."'>Edit</a></button>
                            <button class='dlt'><a href='javascript:void()' onclick='confirmation($pid)'>Delete</a></button>
                            </div>
                            </td>
                        </tr>";
                    }
                }
            }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>