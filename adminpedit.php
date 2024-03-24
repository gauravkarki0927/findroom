<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

$nquery = "SELECT * FROM users where uid='$id'";
$nrest = mysqli_query($conn, $nquery);
    if($nrest){
        $row=mysqli_fetch_assoc($nrest);
        $dob=$row['dob'];
        $country=$row['country'];
        $state=$row['state'];
        $city=$row['city'];
        $postal=$row['postal'];
        $uname=$row['username'];
        $uemail=$row['email'];
        $phone=$row['phone'];
        $desc=$row['descr'];
        $martial=$row['martial'];
        $gender=$row['gender'];
        $sm1=$row['social'];
        $sm2=$row['social2'];
        $prof=$row['profession'];
        $image=$row['uprofile'];
    }

if(isset($_POST['submit'])){
    $dob=$_POST['dob'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $postal=$_POST['postal'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sm1=$_POST['sm1'];
    $sm2=$_POST['sm2'];
    $prof=$_POST['prof'];

    $filename= $_FILES["image"]["name"];
    $tempname= $_FILES["image"]["tmp_name"];
    $folder ="users/".$filename;

    move_uploaded_file($tempname, $folder);

    $query = "UPDATE users SET username='$uname', email='$email', phone='$phone',gender='$gender', country='$country', state='$state', city='$city',postal='$postal',dob='$dob',descr='$desc', martial='$mart',social='$sm1', social2='$sm2', profession='$prof', uprofile='$folder' where uid='$id'";
    $result = mysqli_query($conn, $query);
        if($result){
            header('Location:admin.php');
        }
        else{
            die(mysqli_error( $conn));
        }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="useredit.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <style>
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
        </style>
</head>

<body>
    <div class="main">
        <div class="top">
            <p class="hs">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
    </div>
    <div class="box">
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off" autosuggestion="off">
            <div class="right">
                <h2>Admin Details</h2>
                <div class="part2">
                    <label>Date of birth:</label><br>
                    <input type="date" name="dob" value=<?php echo $dob; ?>><br>
                    <label>Address:</label><br>
                    <div class="add">
                        <input type="text" placeholder="country" name="country" value=<?php echo $country; ?>>
                        <input type="text" placeholder="state" name="state" value=<?php echo $state; ?>>
                        <input type="text" placeholder="city" name="city" value=<?php echo $city; ?>><br>
                    </div>
                    <label>Postal:</label><br>
                    <input type="number" name="postal" value=<?php echo $postal; ?>><br>
                </div>
                <div class="part1">
                    <label>User name:</label><br>
                    <input type="text" placeholder="Your name" name="uname" required value=<?php echo $uname; ?>><br>
                    <label>Email:</label><br>
                    <input type="email" placeholder="xyz@gmail.com" name="email" value=<?php echo $uemail; ?> required><br>
                    <label>Phone:</label><br>
                    <input type="text" name="phone" value=<?php echo $phone; ?> required><br>
                </div>
                <textarea rows="6" cols="100" maxlength="5000" placeholder="Description" name="desc"><?php echo $desc; ?></textarea>
                <button><a href="admin.php">Cancel</a></button>
                <button class="upd" type="submit" name="submit">Update</button>

            </div>

            <div class="left">
                <div class="top">
                    <div class="image">
                        <img src="<?php echo $image; ?>" id="profile-pic">
                        <label class="input-file" for="input-file"><i class="fa-regular fa-image"></i></label>
                        <input type="file" accepts="image/jpeg, image/png, image/jpg" id="input-file" name="image">
                    </div>
                    <h3><?php echo $uname; ?></h3>
                </div>
                <div class="mid">
                    <p>Relation Status</p>
                    <input type="radio" name="mart" id="mart" value="Married">Married
                    <input type="radio" name="mart" id="mart" value="Unmarried">Unmarried
                    <input type="radio" name="mart" id="mart" value="Not to prefer">Not to prefer
                    <p>Gender</p>
                    <input type="radio" name="gender" id="gender" value="Male">Male
                    <input type="radio" name="gender" id="gender" value="Female">Female
                    <input type="radio" name="gender" id="gender" value="Other">Other
                </div>
                <div class="social">
                    <label>Social Media</label><br>
                    <input type="text" name="sm1" value=<?php echo $sm1; ?>><br>
                    <label>Other websites</label><br>
                    <input type="text" name="sm2" value=<?php echo $sm2; ?>><br>
                    <label>Profession</label><br>
                    <input type="text" name="prof" value=<?php echo $prof; ?>><br>
                </div>
            </div>
        </form>
    </div>
    <script>
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("input-file");

        inputFile.onchange = function(){
            profilePic.src = URL.createObjectURL(inputFile.files[0]);
        };
        </script>
</body>

</html>