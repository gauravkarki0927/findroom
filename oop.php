<?php

abstract class Shape {
    protected $length;
    protected $breadth;

    public function __construct($length, $breadth) {
        $this->length = $length;
        $this->breadth = $breadth;
    }

    abstract public function area();
}

class Rectangle extends Shape {
    public function area() {
        return $this->length * $this->breadth;
    }
}

class Square extends Shape {
    public function area() {
        return $this->length * $this->length;
    }
}

class Circle extends Shape {
    protected $radius;

    public function __construct($length, $breadth, $radius) {
        parent::__construct($length, $breadth);
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}


if(isset($_POST['submit'])){
    $length=$_POST['length'];
    $breadth=$_POST['breadth'];
    $radius=$_POST['radius'];
    $rectangle = new Rectangle($length, $breadth);
    $square = new Square($length, $breadth);
    $circle = new Circle($length, $breadth, $radius);
    
    echo "Area of Rectangle: " . $rectangle->area() . PHP_EOL;
    echo "Area of Square: " . $square->area() . PHP_EOL;
    echo "Area of Circle: " . $circle->area() . PHP_EOL;
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Length:<input type="number" name="length"><br>
        Breadth:<input type="number" name="breadth"><br>
        Radius:<input type="number" name="radius"><br>
        <input type="submit" name="submit" value="submit"><br>
</form>
</body>
</html>