<?php
$x = "Hello";
$y = 'Hello world';

var_dump($x);
echo "<br>";
var_dump($y);

echo "<br>";

$var = 5656;
var_dump(" ".$var);
echo "<br>";


$z = true;
var_dump($x);

echo "<br>";
$car = array('volvo','bmw','toyota');
var_dump($car);

//class demo oop

echo "<br><br>";
class car{
   public $color;
   public $model;

   public function _construct($color,$model){
      $this -> color = $color;
      $this -> color = $model;
   }

   public function message(){
    return "my car is a ". $this->color ." ".$this ->model. "!";
   }
}
$mycar = new car("red","bmw");
var_dump($mycar);

echo "<br>";

$a = "Hello world!";
$a = null;
var_dump($a);

$a = 5;
var_dump($a);


?>

