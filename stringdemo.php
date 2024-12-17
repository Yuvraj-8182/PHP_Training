<?php
//use lenth of strings
echo strlen("hello world!");
echo "<br>";

//use counts the words
echo str_word_count("hello world yuvraj");
echo "<br>";

//use charater positon
echo strpos("hello world!","world");
echo "<br>";

//use upper case strings
$x = "Hello World!";
echo strtoupper($x);
echo "<br>";
echo strtoupper("yuvraj");
echo "<br>";


//use replace strings
$y ="  hello   world!  ";
echo str_replace("world!","yuvraj",$y);
echo "<br>";

//use reverses strings
echo strrev($y);
echo "<br>";

//use remove white space
echo trim($y);
echo "<br>";

//use strings to array convert
$b="hello yuvraj";
$c=explode(" ",$b);
print_r($c);
echo "<br>"; 

$str1 = "Hello";
$str2 = "World";
$z = $str1 . " " . $str2;
echo $z;
echo "<br>";
//use range of strings
echo substr($b,6,3);
echo "<br>";
$r = 1.9e411;
var_dump($r);

?>
