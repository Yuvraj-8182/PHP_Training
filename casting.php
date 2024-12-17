<?php 
// $a = 5;       // Integer
// $b = 5.34;    // Float
// $c = "hello"; // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (string) $a;
// $b = (string) $b;
// $c = (string) $c;
// $d = (string) $d;
// $e = (string) $e;

// //To string
// var_dump($a);
// echo "<br>";
// var_dump($b);
// echo "<br>";
// var_dump($c);
// echo "<br>";
// var_dump($d);
// echo "<br>";
// var_dump($e);
// echo "<br>";

//bool casting
// $a = 5;       // Integer
// $b = 5.34;    // Float
// $c = 0;       // Integer
// $d = -1;      // Integer
// $e = 0.1;     // Float
// $f = "hello"; // String
// $g = "";      // String
// $h = true;    // Boolean
// $i = NULL;    // NULL


// $a = (bool) $a;
// $b = (bool) $b;
// $c = (bool) $c;
// $d = (bool) $d;
// $e = (bool) $e;
// $f = (bool) $f;
// $g = (bool) $g;
// $h = (bool) $h;
// $i = (bool) $i;

// var_dump($a);
// echo "<br>";
// var_dump($b);
// echo "<br>";
// var_dump($c);
// echo "<br>";
// var_dump($d);
// echo "<br>";
// var_dump($e);
// echo "<br>";
// var_dump($f);
// echo "<br>";
// var_dump($g);
// echo "<br>";
// var_dump($h);
// echo "<br>";
// var_dump($i);
// echo "<br>";


//array casting
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
  }
  
  $myCar = new Car("red", "Volvo");
  
  $myCar = (array) $myCar;
  var_dump($myCar);

echo "<br>";
  //to object
// $a = 5;       // Integer
// $b = 5.34;    // Float
// $c = "hello"; // String
// $d = true;    // Boolean
// $e = NULL;    // NULL

// $a = (object) $a;
// $b = (object) $b;
// $c = (object) $c;
// $d = (object) $d;
// $e = (object) $e;

// var_dump($a);
// echo "<br>";
// var_dump($b);
// echo "<br>";
// var_dump($c);
// echo "<br>";
// var_dump($d);
// echo "<br>";
// var_dump($e);
// echo "<br>";





?>