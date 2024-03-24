<?php
include('connect.php');
session_start();

if(empty($_SESSION['users'])){
    header('Location:login.php');
}
$id= $_SESSION['users'];
$username= $_SESSION['username'];

if(isset($_GET['reviewid'])){
    $rid=$_GET['reviewid'];

    $readsql ="SELECT * FROM review WHERE id='$rid'";
    $checksql =mysqli_query($conn, $readsql);
    $row = mysqli_fetch_array($checksql);
    $rating=$row['ratings'];
    $mymessage=$row['review'];
    if(isset($_POST['submit'])){
        $count=$_POST['count'];
        $message=$_POST['review'];
      
        $mysql="UPDATE review SET ratings='$count', review='$message' WHERE id='$rid'";
        $myrest =mysqli_query($conn, $mysql);
        if(!$myrest){
          echo "<script> alert('Update failed!');</script>";
        }
        else{
          echo "<script> alert('Review Updated');
          document.location.href = 'userreview.php';
          </script>";
        }
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script>
        function cancel() {
            let a = document.getElementById('box');
            let b = document.getElementById('review');
            if (onclick = true) {
                b.style.display = "none";
                document.location.href = 'userreview.php';
            }
        }
    </script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            user-select: none;
        }

        .edit-review {
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

         .edit-review h2 {
            text-align: center;
            margin-bottom: 20px;
        }

          .edit-review label {
            display: block;
            margin-bottom: 10px;
        }

          .edit-review .rate {
            display: flex;
            flex-direction: row;
        }

         .edit-review .rating {
            padding-bottom: 12px;
        }

        .edit-review input[type="text"],
        .edit-review textarea {
            width: 100%;
            padding: 8px 6px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: none;
            outline: none;
        }

        .edit-review input[type="text"]:hover,
        .edit-review textarea:hover {
            border-color: green;
        }

         .edit-review button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-review button:hover {
            background-color: #45a049;
        }

         /* .edit-review .close-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #ccc;
        }

        .edit-review .close-icon:hover {
            color: #c20303;
        } */
    </style>
</head>

<body>
    <div class="edit-review" id="review">
        <!-- <i class="fa-solid fa-times close-icon" onclick="cancel()"></i> -->
        <h2>Update Your Review</h2>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input disabled type="text" id="name" name="name" value=<?php echo $username; ?>>
            <div class="rate">
                <div id="rating" class="rating">
                    <label for="rating">Star Rating:</label>
                    <i class="fa-solid fa-star" data-index="0"></i>
                    <i class="fa-solid fa-star" data-index="1"></i>
                    <i class="fa-solid fa-star" data-index="2"></i>
                    <i class="fa-solid fa-star" data-index="3"></i>
                    <i class="fa-solid fa-star" data-index="4"></i>
                </div>
                <div class="value" id="valv">
                   <?php echo $rating ?>/5
                </div>
                <input type="hidden" id="count" value="" name="count">
            </div>
            <label for="review">Review:</label>
            <textarea id="review" name="review" rows="4" cols="50" required><?php echo $mymessage; ?></textarea>

            <button type="submit" name="submit">Submit</button>
        </form>
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