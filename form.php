<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db = "hamrobus";

$con = mysqli_connect($db_server, $db_username, $db_password, $db);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "INSERT INTO signin(useremail, password) VALUES('$email','$password')";
    if ($con->query($sql) === TRUE) {
        echo
            "
            <script>
                alert('Your account has been created successfully');
            </script>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
}
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In Form</title>
<link rel="stylesheet" type="" href="">
<script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
<script>
        function signup() {
            var b = document.forms["sign"]["email"];
            var d = document.forms["sign"]["pass"].value;
            var e = document.forms["sign"]["cpass"].value;
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var errors = document.getElementById('error');
            if (b === "") {
                alert("Email field cannot be empty!");
                return false;
            } else if (!b.value.match(validRegex)) {
                alert("Invalid Email!");
                return false;
            } else if ((d == "") || (e== "")) {
                alert("Password field cannot be empty!");
                return false;
            } else if (d != e){
                alert("Password Not Matched!");
                return false;
            } 
            else {
                return true;
            }
        }
    </script>

</head>
<body>
  <nav>
    <div class="container1">
        <div class="logo">
            <img src="rental.png" alt="">
            <div class="title"> Hamro Bus</div>

        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="signin.php">Sign In</a></li>
        </ul>
    </div>
</nav>
<div class="containerr">
  <h2>SIGN UP</h2>
  <form class="signnn" method="POST" name="sign" onsubmit="return signup()">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Your Email">

    <label for="password">Password:</label>
    <input type="password" id="pass" name="password" placeholder="Your Password">
    <label for="password">Confirm Password:</label>
    <input type="password" id="cpass" name="password1" placeholder="Confirm Your Password">


    <input type="submit" value="Sign In" name="submit"></input><br>

    
    <p class="new-user">Already have an account?<a href="login.php"> Login</a></p>
  </form>
</div>
<footer>
  <div class="container3">
      <div class="payment-icons">
          <h6>Payment Options</h6>
          <img class="esewa" src="esewa-zone-office-bayalbas-google-play-iphone-iphone.jpg" alt="">
          <img class="khalti" src="Naya_Khalti_Logo_icon_2018.jpg" alt="">
          <img class="ime" src="1200x630wa.png" alt="">
      </div>
      <div class="footer-links">
          <h5>Useful Links</h5>
          <a href="home.php">Home</a>
          <a href="about.php">About</a>
          <a href="contact.php">Contact</a>
          <a href="signup.php">Sign in</a>
      </div>
      <div class="toproute">
          <h4>Top-Route</h4>
          <ul>
              <li>Butwal-Kathmandu</li>
              <li>Kathmandu-Bhairahwa</li>
              <li>Kathmandu-Kapilvastu</li>
              <li>Kathmandu-Dang</li>
              <li>Pokhara-Kathmandu</li>
          </ul>
      </div>
      <div class="toproute2">
          <ul>
              <li>Kathmandu-Chitwan</li>
              <li>Kathmandu-Nepalgunj</li>
              <li>kathmandu-Baglung</li>
              <li>Kathmandu-Butwal</li>
          </ul>
      </div>
      <div class="topoperator">
          <h3>Top-Operators</h3>
          <ul>
              <li>Pashchim Nepal Bus Byabasayi Pvt. Ltd</li>
              <li>Sajha Yatayat</li>
              <li>Namaste Kapilvastu Tours & Travels</li>
              <li>Shuva Jagadamba Travels</li>
              <li>Dhaulagiri Gandaki Yatayat Sewa Pvt. Ltd.</li>
          </ul>
      </div>
  </div>
  <hr>  
      <i>2023 © All Rights Reserved.</i>
</footer>
<script>
// document.querySelector('form[name="sign"]').addEventListener('submit', function(event) {
//   if (!signup()) {
//     event.preventDefault();
//   }
// });
</script>
</body>
</html>