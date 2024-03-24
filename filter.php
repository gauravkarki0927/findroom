<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            display:flex;
            flex-direction:row;
            border:1px solid black;
            /* width:55%; */
            padding:4px;
            border-radius:4px;
            text-align:center;
            line-height:30px;
        }
        input{
            margin-left:16px;
        }
        .sub{
            display:flex;
            margin:12px;
            /* padding:4px 8px; */
            width:60px;
            height:30px;
        }
    </style>
</head>
<body>
<h1>Filter Here</h1>
    <div class="box">
   
    <input type="radio" name="price" value="3500"><p>0-3500</p>
    <input type="radio" name="price" value="5000"><p>0-5000</p>
    <input type="radio" name="price" value="7000"><p>0-7000</p>
    <input type="radio" name="price" value="9000"><p>0-9000</p>
    <input type="radio" name="price" value="10000"><p>0-10000</p>
    <input type="radio" name="price" value="10000"><p>10000+</p>
    <input class="sub" type="submit" name="submit" value="Submit">
    </div>
</body>
</html>