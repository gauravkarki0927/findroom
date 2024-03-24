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
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        footer{
            position:fixed;
            bottom:0;
            left:0;
            right:0;
            height:30px;
            background:rgba(239, 242, 243, 0.601);
            background:#fff;
            border-collapse: collapse;
        }
        footer ul{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:20px;

        }
        footer ul li{
            box-sizing: border-box;
            list-style:none;
            line-height:30px;
            font-size:12px;
        }
        @media (max-width:742px) {
            footer{
                height:50px;
                padding:6px;
            }
            footer ul{
                display:grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 20px 20px;
                gap:0px;
                text-align:center;
            }
        }
        @media (max-width:503px) {
            footer{
                height:50px;
                padding:6px;
            }
            footer ul{
                display:grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 20px 20px;
                gap:0px;
                text-align:center;
            }
            footer ul li{
                font-size:10px;
            }
        }
        @media (max-width:405px) {
            footer{
                display:none;
            }
        }
        </style>
</head>
<body>
    <footer>
        <ul>
            <li>Contact: Divertole, 10 Rupandehi, Nepal</li>
            <li>Email: findroomnp@gmail.com</li>
            <li>Phone: 071-xxxxxxx</li>
            <li><span>&#169;</span> Copyright, findroom</li>
        </ul>
    </footer>
</body>
</html>