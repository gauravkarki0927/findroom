<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        /* data table */
        .box {
            width: 90%;
            user-select: none;
            height: auto;
            padding: 4px;
            position: absolute;
            z-index: -1;
            top: 21%;
            left: 3%;
        }

        .box .cont {
            border-collapse: collapse;
            margin: 18px 0;
            font-size: 1em;
            text-align: left;
            width: 100%;
            /* Ensure the table takes up 100% of the width */
            text-align: left;
        }

        .box .cont td {
            padding: 18px 6px;
        }

        .box table tbody tr td .post {
            margin: auto;
            border: 2px solid #dad3d382;
            background: #fff;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            width: 284px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .box .cont .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .box .cont tbody tr {
            border-radius: 4px;
        }

        .box table tbody tr td .post:hover {
            border: 2px solid rgb(201, 209, 213);
            box-shadow: 0 0 16px 8px rgba(132, 132, 132, 0.329);
        }

        .box table tbody tr td .des {
            padding: 4px;
        }

        .box table tbody tr td .post .img {
            width: 280px;
            height: 200px;
            display: flex;
            text-align: center;
            margin: auto;
        }

        .box table tbody tr td .post .wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box table tbody tr td .post .wrapper .img {
            width: 100%;
            display: block;
            margin: auto;
        }

        .box table tbody tr td .post .wrapper .vi i:hover {
            font-size: 18px;
        }

        .box table tbody tr td .post .wrapper .vi i {
            color: rgb(14, 204, 0);
            margin: 4px;
            animation: blink 1s linear infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .box table tbody tr td .post .wrapper a {
            text-decoration: none;
            font-size: 12px;
            color: #000;
        }

        .box table tbody tr td button {
            margin-top: 6px;
            margin-bottom: 6px;
            width: 100px;
            padding: 6px;
            border-radius: 4px;
            outline: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
            background: rgb(207, 33, 3);
        }

        .box table tbody tr td button:hover {
            background: rgb(14, 147, 4);
        }

        .box table tbody tr td button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="top">
            <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
    </div>

    <div class="box" id="cont">
        <table class="cont">
            <tbody class="cards">
                <?php
                 if(isset($_GET['usersid'])){
                    $data=$_GET['usersid'];
                    $query = "SELECT * FROM userpost where userid='$data' ORDER BY pid DESC";
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
                                                <div class='wrapper'>
                                                <div class='img'>
                                                <img src='".$image."' width='280px' height='200px'>
                                                <div class='vi'><a href='postdetails.php?pid=".$pid."'><i class='fa-solid fa-link'></i>View details</a></div>
                                                </div>
                                                </div>
                                                <div class='des'>
                                                <br><p>Rs.".$price."</p>".$street." ".-$ward." ".$city."<br>".$district.", ".$country."<br><form method='POST'>
                                                <button name='deal'><a href='dealbox.php?db=".$pid."'>Make a deal</a></button></form>
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
    </div>
</body>

</html>