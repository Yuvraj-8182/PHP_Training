<?php 
$x = 5985;
var_dump(is_numeric($x));
echo "<br>";

$x = "5985";
var_dump(is_numeric($x));
echo "<br>";

$x = "59.85" + 100;
var_dump(is_numeric($x));
echo "<br>";

$x = "Hello";
var_dump(is_numeric($x));
echo "<br>";


// Cast float to int
$x = 34.40;
$int_cast = (int)$x;
echo $int_cast;

echo "<br>";

// Cast string to int
$x = "56566";
$int_cast = (int)$x;
echo $int_cast;




?>