<?php

include('connect.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

if(isset($_GET['pdata'])){
$pid=$_GET['pdata'];
$sqli= "SELECT * FROM userpost where pid='$pid'";
$resul = mysqli_query($conn, $sqli);
$rows=mysqli_fetch_assoc($resul);
$uprice =$rows['price'];
$uarea = $rows['street'];
$uwd =$rows['ward'];
$uct = $rows['city'];
$udist = $rows['district'];
$ust =$rows['states'];
$uctry =$rows['country'];
$uinfo =$rows['details'];

if(isset($_POST['submit'])){

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

$sql = "UPDATE userpost SET images='$folder', price='$price', street='$area', ward='$wd', city='$ct', district='$dist', states='$st', country='$ctry', details='$info' where pid='$pid'";
    if ($conn->query($sql) === TRUE) {
        $date= "INSERT INTO postupdate(pid) VALUES('$pid')";
        $check = mysqli_query($conn, $date);
        header('location:admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
}
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
            if (i == "") {
                alert("Price cannot be empty");
                return false;
            }
            else if (a == "") {
                alert("Street cannot be empty");
                return false;
            }
            else if (b == "") {
                alert("Ward cannot be empty");
                return false;
            }
            else if (c == "") {
                alert("City cannot be empty");
                return false;
            }
            else if (d == "") {
                alert("District cannot be empty");
                return false;
            }
            else if (e == "") {
                alert("State cannot be empty");
                return false;
            }
            else if (f == "") {
                alert("Country cannot be empty");
                return false;
            }
            else if (g == "") {
                alert("File cannot be empty");
                return false;
            }
            else if (h == "") {
                alert("Details cannot be empty");
                return false;
            }
            else {
                alert("Details Updated successfully");
            }
        }
        function cancel() {
            var upload = document.getElementById('upload');
            var cont = document.getElementById('cont');
            var create = document.getElementById('create');
            if (upload.style.display != 'none') {
                window.history.back();
            }
            else {
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
                <div class="top">
                    Fill up the post details correctly
                </div>
                <div class="details">
                    <div class="left">
                        <label class="a">Price</label>
                        <input type="text" name="pr" value=<?php echo $uprice; ?>>
                        <label class="a">Area/street</label>
                        <input type="text" name="street" placeholder="Santimarg" value=<?php echo $uarea; ?>>
                        <label class="a">Ward number</label>
                        <input type="text" name="ward" value=<?php echo $uwd; ?>>
                        <label class="a">City/village</label>
                        <input type="text" name="city" value=<?php echo $uct; ?>>
                    </div>

                    <div class="right">
                        <label class="a">District</label>
                        <input type="text" name="district" value=<?php echo $udist; ?>>
                        <label class="a">State</label>
                        <input type="text" name="state" placeholder="Lumbini" value=<?php echo $ust; ?>>
                        <label class="a">Country</label>
                        <input type="text" name="country" value=<?php echo $uctry; ?>><br>
                        <label class="custom-file" for="custom-input-file">Upload image</label>
                        <input type="file" accepts="image/jpeg, image/png, image/jpg" id="custom-input-file"
                            name="image">
                    </div>
                </div>
                <div class="text">
                    <label class="a">Your post details</label>
                    <textarea name="information" id="text" cols="30" rows="10" maxlength="1000"><?php echo $uinfo; ?></textarea>
                </div>
                <div class="below">
                    <input class="cnc" type="button" value="Cancel" onclick="cancel()">
                    <button type="submit" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>