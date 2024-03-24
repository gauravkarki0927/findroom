<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

$nquery = "SELECT * FROM users where uid='$id'";
$nrest = mysqli_query($conn, $nquery);
    if($nrest){
        $row=mysqli_fetch_assoc($nrest);
        $udob=$row['dob'];
        $ucountry=$row['country'];
        $ustate=$row['state'];
        $ucity=$row['city'];
        $upostal=$row['postal'];
        $uname=$row['username'];
        $uemail=$row['email'];
        $uphone=$row['phone'];
        $udesc=$row['descr'];
        $umartial=$row['martial'];
        $ugender=$row['gender'];
        $usm1=$row['social'];
        $usm2=$row['social2'];
        $uprof=$row['profession'];
        $uimage=$row['uprofile'];
    }

if(isset($_POST['submit'])){
    $dob=$_POST['dob'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $postal=$_POST['postal'];
    $name=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $mart=$_POST['mart'];
    $gender=$_POST['gender'];
    $desc=$_POST['desc'];
    $sm1=$_POST['sm1'];
    $sm2=$_POST['sm2'];
    $prof=$_POST['prof'];

    $query = "UPDATE users SET username='$name', email='$email', phone='$phone',gender='$gender', country='$country', state='$state', city='$city',postal='$postal',dob='$dob',descr='$desc', martial='$mart',social='$sm1', social2='$sm2', profession='$prof'";
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){
        $filename= $_FILES["image"]["name"];
        $tempname= $_FILES["image"]["tmp_name"];
        $folder ="users/".$filename;
        move_uploaded_file($tempname, $folder);
        $new_image = true;
    }
    else{
        $new_image = false;
    }
    if($new_image){
        $query .= ", uprofile='$folder'";
    }
    $query .= " where uid='$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        $date= "INSERT INTO userupdate(uid) VALUES('$id')";
        $check = mysqli_query($conn, $date);
        header('Location:userprofile.php');
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
</head>

<body>
    <div class="box">
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off" autosuggestion="off">
            <div class="right">
                <h2>User Details</h2>
                <div class="part2">
                    <label>Date of birth:</label><br>
                    <input type="date" name="dob" value=<?php echo $udob; ?>><br>
                    <label>Address:</label><br>
                    <div class="add">
                        <input type="text" placeholder="country" name="country" value=<?php echo $ucountry; ?>>
                        <input type="text" placeholder="state" name="state" value=<?php echo $ustate; ?>>
                        <input type="text" placeholder="city" name="city" value=<?php echo $ucity; ?>><br>
                    </div>
                    <label>Postal:</label><br>
                    <input type="number" name="postal" value=<?php echo $upostal; ?>><br>
                </div>
                <div class="part1">
                    <label>User name:</label><br>
                    <input type="text" placeholder="Your name" name="uname" required value="<?php echo $uname; ?>"><br>
                    <label>Email:</label><br>
                    <input type="email" placeholder="xyz@gmail.com" name="email" value=<?php echo $uemail; ?> required><br>
                    <label>Phone:</label><br>
                    <input type="text" name="phone" value=<?php echo $uphone; ?> required><br>
                </div>
                <textarea rows="6" cols="100" maxlength="5000" placeholder="Description" name="desc"><?php echo $udesc; ?></textarea>
                <button><a href="userprofile.php">Cancel</a></button>
                <button class="upd" type="submit" name="submit">Update</button>

            </div>

            <div class="left">
                <div class="top">
                    <div class="image">
                        <img src="<?php echo $uimage; ?>" id="profile-pic">
                        <label class="input-file" for="input-file"><i class="fa-regular fa-image"></i></label>
                        <input type="file" accepts="image/jpeg, image/png, image/jpg" id="input-file" name="image">
                    </div>
                    <h3><?php echo $uname; ?></h3>
                </div>
                <div class="mid">
                    <p>Relation Status</p>
                    <input type="radio" name="mart" id="married" value="Married" <?php echo ($umartial == 'Married') ? 'checked' : ''; ?>>Married
                    <input type="radio" name="mart" id="unmarried" value="Unmarried" <?php echo ($umartial == 'Unmarried') ? 'checked' : ''; ?>>Unmarried
                    <input type="radio" name="mart" id="not_to_prefer" value="Not to prefer" <?php echo ($umartial == 'Not to prefer') ? 'checked' : ''; ?>>Not to prefer
                    <p>Gender</p>
                    <input type="radio" name="gender" id="male" value="Male" <?php echo ($ugender == 'Male') ? 'checked' : ''; ?>>Male
                    <input type="radio" name="gender" id="female" value="Female" <?php echo ($ugender == 'Female') ? 'checked' : ''; ?>>Female
                    <input type="radio" name="gender" id="other" value="Other" <?php echo ($ugender == 'Other') ? 'checked' : ''; ?>>Other
                </div>
                <div class="social">
                    <label>Social Media</label><br>
                    <input type="text" name="sm1" value=<?php echo $usm1; ?>><br>
                    <label>Other websites</label><br>
                    <input type="text" name="sm2" value=<?php echo $usm2; ?>><br>
                    <label>Profession</label><br>
                    <input type="text" name="prof" value=<?php echo $uprof; ?>><br>
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