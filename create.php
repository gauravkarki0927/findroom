<?php

include('connect.php');
session_start();
$id= $_SESSION['users'];
$email= $_SESSION['useremail'];

if(isset($_POST['submit'])){
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "findroom";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    $filename= $_FILES["image"]["name"];
    $tempname= $_FILES["image"]["tmp_name"];
    $folder ="images/".$filename;

    move_uploaded_file($tempname, $folder);

    $price =$_POST['pr'];
    $area = $_POST['street'];
    $wd =$_POST['ward'];
    $ct = $_POST['city'];
    $dist = $_POST['district'];
    $st =$_POST['state'];
    $ctry =$_POST['country'];
    $info =$_POST['information'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userpost(userid, useremail, images, price, street, ward, city, district, states, country, details) VALUES ('$id', '$email', '$folder','$price', '$area', '$wd', '$ct', '$dist', '$st', '$ctry', '$info')";

if ($conn->query($sql) === TRUE) {
    header('location:userdash.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="create.css">
    <script>
        
        function validateForm() {
            var a = document.forms["myForm"]["street"].value;
            var b = document.forms["myForm"]["ward"].value;
            var c = document.forms["myForm"]["city"].value;
            var d = document.forms["myForm"]["district"].value;
            var e = document.forms["myForm"]["state"].value;
            var f = document.forms["myForm"]["country"].value;
            var g = document.forms["myForm"]["image"].value;
            var h = document.forms["myForm"]["information"].value;
            var i = document.forms["myForm"]["pr"].value;
            var errors = document.getElementById('error');
            if (i == "") {
                errors.style.color ="red";
                errors.innerHTML = "Price cannot be empty!";
                return false;
            }
            else if (!i.match(/[0-9]/)) {
                errors.style.color ="red";
                errors.innerHTML = "Invaild price type![Use Numbers Only]";
                return false;
            }
            else if (a == "") {
                errors.style.color ="red";
                errors.innerHTML = "Street cannot be empty!";
                return false;
            }
            else if (b == "") {
                errors.style.color ="red";
                errors.innerHTML = "Ward cannot be empty!";
                return false;
            }
            else if (c == "") {
                errors.style.color ="red";
                errors.innerHTML = "City cannot be empty!";
                return false;
            }
            else if (d == "") {
                errors.style.color ="red";
                errors.innerHTML = "District cannot be empty!";
                return false;
            }
            else if (e == "") {
                errors.style.color ="red";
                errors.innerHTML = "State cannot be empty!";
                return false;
            }
            else if (f == "") {
                errors.style.color ="red";
                errors.innerHTML = "Country cannot be empty!";
                return false;
            }
            else if (g == "") {
                errors.style.color ="red";
                errors.innerHTML = "Invalid file or empty!";
                return false;
            }
            else if (h == "") {
                errors.style.color ="red";
                errors.innerHTML = "Details cannot be empty!";
                return false;
            }
            else {
                alert("Details submitted successfully");
                document.location.href = 'userdash.php';
            }
        }
        function cancel() {
            var upload = document.getElementById('upload');
            var cont = document.getElementById('cont');
            var create = document.getElementById('create');
            if (upload.style.display != 'none') {
                document.location.href = 'userdash.php';
            }
            else{
                upload.style.display = 'block';
            }
        }
    </script>
</head>

<body>

    <div class="upload" id="upload">
        <div class="inner">
            <form method="POST" name="myForm" enctype="multipart/form-data" onsubmit="return validateForm()"
                autocomplete="off" autosuggestion="off">
                <div class="top" id="error">
                    Fill up the details correctly
                </div>
                <div class="details">
                    <div class="left">
                        <label class="a">Price</label>
                        <input type="text" name="pr">
                        <label class="a">Area/street</label>
                        <input type="text" name="street" placeholder="Santimarg">
                        <label class="a">Ward number</label>
                        <input type="text" name="ward">
                        <label class="a">City/village</label>
                        <input type="text" name="city">
                    </div>

                    <div class="right">
                        <label class="a">District</label>
                        <input type="text" name="district">
                        <label class="a">State</label>
                        <input type="text" name="state" placeholder="Lumbini">
                        <label class="a">Country</label>
                        <input type="text" name="country"><br>
                        <label class="custom-file" for="custom-input-file">Upload image</label>
                        <div class="cyc">
                        <input type="file" accepts="image/jpeg, image/png, image/jpg" id="custom-input-file"
                            name="image">
                        <img src="blank.jpg" id="profile-pic">
                        </div>
                    </div>
                </div>
                <div class="text">
                    <label class="a">Your post details</label>
                    <textarea name="information" id="text" cols="30" rows="10" maxlength="1000"></textarea>
                </div>
                <div class="below">
                    <input class="cnc" type="button" value="Cancel" onclick="cancel()">
                    <button type="submit" name="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
        <script>
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("custom-input-file");

        inputFile.onchange = function(){
            profilePic.src = URL.createObjectURL(inputFile.files[0]);
        };
        </script>
</body>

</html>