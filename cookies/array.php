<?php
//index array
$fruits = array("apple","banana","abd","xyz");
var_dump($fruits);
echo "<br>";
$fruits[]="KIWI";
var_dump($fruits);
echo "<br>";
$fruits[2]="blueberry";
var_dump($fruits);


//Associative Array
$person = array(
    "name" => "yuvraj",
    "age" => 30,
    "city" =>"amreli"
);
echo "<br>";

var_dump($person);
$person["email"]="yuvraj@gmail.com";
echo "<br>";
var_dump($person);

echo "<br>";
$person["age"] = 23;
unset($person["city"]);
var_dump($person);
echo "<br>";
//Multidimensional Arrays
$std = array(
    array("name"=>"yuvraj","age"=>22),
    array("name"=>"om","age"=>23)
);

var_dump($std);
echo "<br>";
echo "<br>";
array_push($std,array("name"=>"jay","age"=>55));
var_dump($std);
echo "<br>";

$std[0]["age"]=23;
var_dump($std);
echo "<br>";

$std[1]["name"]="vivek";
var_dump($std);
echo "<br>";
echo "<br>";    
$std[] = array("name"=>"om","age"=>35,"deprt"=>"mca");
var_dump($std);
echo "<br>";

unset($std[1][1]);
var_dump($std);
?>