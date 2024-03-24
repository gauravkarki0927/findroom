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
    <title>User Search</title>
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
    sts = confirm("Are you sure you want to delete this user?");
    if(sts){
        document.location.href=`adelete.php?data=${id}`;
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Total Post</th>
                        <th>Alter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['srch'])){
                        $data=$_POST['data'];
                        $sql = "SELECT * FROM users where username LIKE '%$data%' or email LIKE '%$data%' or phone LIKE '%$data%' or gender LIKE '%$data%' or martial LIKE '%$data%' or city LIKE '%$data%' or state LIKE '%$data%' or country LIKE '%$data%' or profession LIKE '%$data%' ";
                        $result = mysqli_query($conn, $sql);
    
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $uid =$row['uid'];
                        $pass=$row['username'];
                        $email =$row['email'];
                        $phone =$row['phone'];
                        $gender =$row['gender'];
                        $sqli = mysqli_query($conn, "SELECT COUNT(*) FROM userpost where userid='$uid'");
                        $results = mysqli_fetch_array($sqli);
                        $tp = $results[0];
                        echo"
                        <tr>
                            <th><a href='adminview.php?usersid=".$uid."'>".$uid."</a></th>
                            <td>".$pass."</td>
                            <td>".$email."</td>
                            <td>".$phone."</td>
                            <td>".$gender."</td>
                            <th><a href='totalpost.php?usersid=".$uid."'>".$tp."</a></th>
                            <td><div class='abtn'>
                            <button class='edit'><a href='auseredit.php?uid=".$uid."'>Edit</a></button>
                            <button class='blk'><a href='block.php?uid=".$uid."'>Block</a></button>
                            <button class='dlt'><a href='javascript:void()' onclick='confirmation($uid)'>Delete</a></button>
                            
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