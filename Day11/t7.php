<?php
abstract class Shape{
    protected $num;
    function __construct($num){
        $this->num=$num;
    }
    abstract public function draw();
}
class Rectangle extends Shape{
    public function draw(){
    return "Rectangle " . $this->num**3;
    }
}
class Circle extends Shape{
    public function draw(){
        return "circle " . 3.14*$this->num**2;
    }
    
}
$shape = [
    new Rectangle(3),
    new Circle(3),
];
foreach ($shape as $s) {
echo $s->draw() . "<br>";
}
?>