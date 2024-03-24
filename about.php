<?php

include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <style>
        /* Reset some default styles */
        body,
        h1,
        p {
            margin: 0;
            padding: 0;
        }

        /* Main section for About Us content */
        .about-section {
            padding: 18px;
            text-align: center;
            background-color: #3a3e47;
            color: rgba(255, 255, 255, 0.728);
        }

        .about-section ul{
            display:flex;
            flex-direction:row;
            justify-content:center;
            height:40px;
        }
        .about-section ul li{
            list-style:none;
            font-size:14px;
            margin-right: 20px;
        }
        .about-section ul li a{
            text-decoration:none;
            color:#fff;
        }
        .about-section ul li .fb:hover{
            color:rgb(0, 72, 255);
        }
        .about-section ul li .yt:hover{
            color:rgb(216, 26, 26);
        }
        .about-section ul li .ig:hover{
            color:rgb(166, 44, 65);
        }
        .about-section ul li .wa:hover{
            color:rgb(10, 174, 10);
        }
        .about-section ul li .tw:hover{
            color:rgb(0, 106, 255);
        }
        h1 {
            color: #ffe2e2;
        }

        nav .logo p {
            line-height: 60px;
            letter-spacing: 1px;
            font-weight: 800;
        }

        .logo p {
            color: rgb(224, 63, 63);
            font-size: 32px;
        }

        .logo p span {
            color: rgb(3, 64, 209);
            font-size: 32px;
        }

        .logo p .nep {
            color: rgb(11, 207, 40);
            font-size: 24px;
        }

        /* Team member cards */
        .column {
            display: flex;
            margin-bottom: 16px;
            justify-content: space-around;
            padding: 0 8px;
        }

        .card,
        .card2 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
            width: 440px;
            height: 330px;
        }

        .card img,
        .card2 img {
            margin-left: 33%;
            padding: 4px;
        }

        .card h2,
        .card2 h2 {
            text-align: center;
        }

        .container {
            padding: 0 16px;
        }

        .title {
            color: grey;
        }

        .button {
            margin-top: 4px;
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000000e0;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        /* Responsive layout for smaller screens */
        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="about-section">
        <div class="logo">
            <p class="h">Find<span>Room</span><span class="nep">.com</span></p>
        </div>
        <p>We are here to provide you an easy option to go find the best suitable rooms available all around the country.</p>
        <p>Create your post and search the room you need in less than a minute</p><br>
        <h3>You can find us at:</h3>
        <ul>
            <li><a class="fb" href="#"><i class="fa-brands fa-facebook fa-xl"></i></a></li>
            <li><a class="yt" href="#"><i class="fa-brands fa-youtube fa-xl"></i></a></li>
            <li><a class="ig" href="#"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
            <li><a class="wa" href="#"><i class="fa-brands fa-whatsapp fa-xl"></i></a></li>
            <li><a class="tw" href="#"><i class="fa-brands fa-twitter fa-xl"></i></a></li>
        </ul>
    </div>

    <h2 style="text-align:center">Our Team Members</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="member44.jpg" alt="Jane" style="width:120px">
                <div class="container">
                    <h2>Mr. Gaurav Karki</h2>
                    <p class="title">Team Manager</p>
                    <p>Expertise in web design and development</p>
                    <p>Under graduate in Bachelor of Computer Application</p>
                    <p>Student of LCC affilited to Tribhuwan University, Nepal</p>
                    <p>gauravkarki@gmail.com</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
            <div class="card2">
                <img src="member55.jpg" alt="Jane" style="width:120px">
                <div class="container">
                    <h2>Miss Anjita Pathak</h2>
                    <p class="title">Team Member</p>
                    <p>Expertise in dubgging and code handling</p>
                    <p>Under graduate in Bachelor of Computer Application</p>
                    <p>Student of LCC affilited to Tribhuwan University, Nepal</p>
                    <p>anjitapathak@gmail.com</p>
                    <p><button class="button">Contact</button></p>
                </div>
            </div>
        </div>
        <!-- Repeat similar card structures for other team members -->
    </div>
</body>

</html>