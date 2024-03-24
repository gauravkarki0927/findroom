<?php
include('connect.php');
session_start();
if(empty($_SESSION['users'])){
    header('Location:login.php');
}
$id= $_SESSION['users'];
$username= $_SESSION['username'];

if(isset($_POST['submit'])){
    $sql = "SELECT * FROM users where uid='$id'";
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        $image =$row['uprofile'];

        $count=$_POST['count'];
        $message=$_POST['review'];
    
        $mysql="INSERT INTO review(userid, username, profiles, ratings, review) VALUES('$id','$username', '$image', '$count', '$message')";
        $myrest =mysqli_query($conn, $mysql);
        if(!$myrest){
          echo "<script> alert('Submission failed!');</script>";
        }
        else{
          echo "<script> alert('Review submitted');</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function cancel() {
            let b = document.getElementById('review');
            if (onclick = true) {
                b.style.display = "none";
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            user-select: none;
        }

        .review-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 340px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .review-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .review-form label {
            display: block;
            margin-bottom: 10px;
        }

        .review-form .rate {
            display: flex;
            flex-direction: row;
        }

        .review-form .rating {
            padding-bottom: 12px;
        }

        .review-form input[type="text"],
        .review-form textarea {
            width: 100%;
            padding: 8px 6px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: none;
            outline: none;
        }

        .review-form input[type="text"]:hover,
        .review-form textarea:hover {
            border-color: green;
        }

        .review-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .review-form button:hover {
            background-color: #45a049;
        }

        .review-form .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #ccc;
        }

        .review-form .close-icon:hover {
            color: #c20303;
        }

        .m1display{
            display:flex;
            width:100%;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid rgba(221, 210, 210, 0.61);
            padding:2px;
        }

        .box, .m2display .box{
            padding:0 4px;
        }
        
        .box .cont {
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 1em;
            text-align: left;
            width:100%;
            text-align: left;
        }
        
        .box .cont td {
            padding: 18px 6px;
        }
        
        .box table tbody tr td .post {
            margin: auto;
            background:rgba(247, 243, 243, 0.664);;
            border-radius: 4px;
            width: 320px;
            margin-bottom: 20px;
            box-sizing: border-box;
            padding:12px;
        }
        .box .cont .cards{
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
        }
        .box .cont tbody tr {
            border-radius: 4px;
        }
        .box table tbody tr td .post:hover {
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .post .header{
            display:flex;
            width:100%;
            height:50px;
        }
        .post .header img{
            width:46px;
            border-radius:50%;
            margin:2px;
        }
        .post .header .tl{
            width:80%;
            padding-left:8px;
            display:block;
        }
        .post .header .tl h3{
            margin:0;
            padding:0;
        }
        .post .header .tl .date{
            font-size:12px;
        }
        .post .rate{
            margin:0px;
            justify-content:center;
            display:flex;
            float:right;
            padding:6px 4px;
        }
        .header .rate span{
            color:rgb(238, 234, 25);
        }
        
        .box table tbody tr td .des {
            padding: 4px;
        }
        .box table tbody tr td .des .msg{
            padding:8px;
            font-size:14px;
        }
        .box table tbody tr td button{
            margin-top: 6px;
            margin-bottom: 6px;
            width: 60px;
            padding:4px;
            border-radius: 3px;
            outline: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
            background: rgb(207, 33, 3);
            color:#fff;
        }

        .box table tbody tr td .btn1{
            background: rgb(14, 147, 4);
        }

        .box table tbody tr td button:hover {
            background: rgb(9, 121, 9);
        }
        .box table tbody tr td .btn2:hover {
            background: rgb(202, 12, 12);
        }
        .box table tbody tr td button a{
            text-decoration:none;
            color:#fff;
        }
    </style>
</head>

<body>
    <?php
      $checksql ="SELECT * FROM review WHERE userid='$id'";
      $checkresult = mysqli_query($conn, $checksql);
      if(!(mysqli_num_rows($checkresult)>0)){
        echo"
      <div class='review-form' id='review'>
      <i class='fa-solid fa-times close-icon' onclick='cancel()'></i>
      <h2>Leave a Review</h2>
      <form action='' method='POST'>
          <label for='name'>Name:</label>
          <input disabled type='text' id='name' name='name' value=".$username.">
          <div class='rate'>
              <div id='rating' class='rating'>
                  <label for='rating'>Star Rating:</label>
                  <i class='fa-solid fa-star' data-index='0'></i>
                  <i class='fa-solid fa-star' data-index='1'></i>
                  <i class='fa-solid fa-star' data-index='2'></i>
                  <i class='fa-solid fa-star' data-index='3'></i>
                  <i class='fa-solid fa-star' data-index='4'></i>
              </div>
              <div class='value' id='valv'>
                 
              </div>
              <input type='hidden' id='count' value='' name='count'>
          </div>
          <label for='review'>Review:</label>
          <textarea id='review' name='review' rows='4' cols='50' maxlength='5000' placeholder='Review contains maximum limit of 5000 characters only!' required></textarea>

          <button type='submit' name='submit'>Submit</button>
      </form>
  </div>
      ";
      }
      ?>
    <div class="m1display">
    <div class="box" id="cont">
            <table class="cont">
                <tbody class="cards">
                    <?php
                    $query = "SELECT * FROM review WHERE userid='$id' ORDER BY id DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $rid=$row['id'];
                                $userid=$row['userid'];
                                $image =$row['profiles'];
                                $name=$row['username'];
                                $date=$row['dates'];
                                $ratings=$row['ratings'];
                                $review=$row['review'];

                                    echo "<tr>
                                        <td>
                                            <div class='post'>
                                                <div class='header'>
                                                    <img src='".$image."'>
                                                    <div class='tl'>
                                                    <h3>".$name."</h3>
                                                    <p class='date'>".$date."</p>
                                                    </div>
                                                    <div class='rate'>
                                                    <p class='count'>".$ratings."/5</p>
                                                    <span class='material-symbols-outlined'>star</span>
                                                </div>
                                                </div>
                                                <div class='des'>
                                                <p class='msg'>".$review."</p>
                                                   <div class='btn'>
                                                        <button class='btn1'><a href='redit.php?reviewid=".$rid."'>Edit</a></button>
                                                        <button class='btn2'><a href='userreview.php?reviewid=".$rid."'>Delete</a></button>
                                                   </div>
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

    <div class="m2display">
    <div class="box" id="cont">
            <table class="cont">
                <tbody class="cards">
                    <?php
                    $query = "SELECT * FROM review ORDER BY id DESC";
                    $rest = mysqli_query($conn, $query);
                        if($rest){
                            while($row=mysqli_fetch_assoc($rest)){
                                $rid=$row['id'];
                                $userid=$row['userid'];
                                $image =$row['profiles'];
                                $name=$row['username'];
                                $date=$row['dates'];
                                $ratings=$row['ratings'];
                                $review=$row['review'];
                                       
                                    echo "<tr>
                                        <td>
                                            <div class='post'>
                                                <div class='header'>
                                                    <img src='".$image."'>
                                                    <div class='tl'>
                                                    <h3>".$name."</h3>
                                                    <p class='date'>".$date."</p>
                                                    </div>
                                                    <div class='rate'>
                                                    <p class='count'>".$ratings."/5</p>
                                                    <span class='material-symbols-outlined'>star</span>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
        </script>

    <script>

        var ratedIndex = -1;
        var count = document.getElementById('count');
        var valv = document.getElementById('valv');

        $(document).ready(function () {
            resetStarColors();

            $('.fa-star').on('click', function () {
                ratedIndex = parseInt($(this).data('index'));
                valv.innerHTML = (ratedIndex + 1) + ("/5");
                count.value = (ratedIndex + 1);
            });

            $('.fa-star').mouseover(function () {
                resetStarColors();

                var currentIndex = parseInt($(this).data('index'));


                for (var i = 0; i <= currentIndex; i++)
                    $('.fa-star:eq(' + i + ')').css('color', 'yellow');
            });
            $('.fa-star').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1) {
                    for (var i = 0; i <= ratedIndex; i++)
                        $('.fa-star:eq(' + i + ')').css('color', 'yellow');
                }
            });
        });
        function resetStarColors() {
            $('.fa-star').css('color', 'black');
        }
    </script>
</body>
</html>

<?php

if(isset($_GET['reviewid'])){
    $urid=$_GET['reviewid'];
    $msql= "DELETE FROM review where id='$urid'";
    $myresult = mysqli_query($conn, $msql);
}
?>