<?php 
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);
// $cars[1]="Ford";
// var_dump($cars);
array_push($cars,"ford");//add
print_r($cars);
echo "<br>";
foreach ($cars as $x)
{
    print_r($cars);
}
echo "<br>";
//associative array

$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
var_dump($car);
//change values 
echo "<br>";
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
$car["year"] = 2023;
var_dump($car);

//access 
echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");
echo $cars[2];

//updated 
echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
foreach ($cars as &$x) {
  $x = "Ford";
}

$x = "ice cream";
var_dump($cars);

echo "<br>";
//add to array
$cars = array("brand" => "Ford", "model" => "Mustang");
$cars["color"] = "Red";
var_dump($cars);

//REMOVE 
echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 1);
var_dump($cars);    

echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
unset($cars[0], $cars[1]);
var_dump($cars);
echo "<br>";
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 2020);
$newarray = array_diff($cars, ["Mustang", 2020]);
var_dump($cars);    

echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
array_pop($cars);
var_dump($cars);

//sorting
echo "<br>";

$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
var_dump($cars);

echo "<br>";
//multidimentional array
echo "<br>";
$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
   var_dump($cars);

   for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
      echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
   }
?>