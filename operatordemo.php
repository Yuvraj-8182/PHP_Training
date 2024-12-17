<?php
$x = 10;  
$y = 6;

//arithmetic operator
echo $x + $y;
echo "<br>";
echo $x - $y;
echo "<br>";
echo $x * $y;
echo "<br>";
echo $x / $y;
echo "<br>";
echo $x % $y;
echo "<br>";
echo $x ** $y;
echo "<br>";

//assigment operator

echo $x = $y;
echo "<br>";
echo $x += $y;
echo "<br>";
echo $x -= $y;
echo "<br>";
echo $x *= $y;
echo "<br>";
echo $x /= $y;
echo "<br>";
echo $x %= $y;
echo "<br>";

//comparison operator

echo $x == $y;
echo "<br>";
echo $x === $y;
echo "<br>";
echo $x > $y;
echo "<br>";
echo $x < $y;
echo "<br>";
echo $x <= $y;
echo "<br>";
echo $x >= $y;
echo "<br>";
echo $x != $y;
echo "<br>";

//increment or decrement

$x = 15;  
echo ++$x;
echo $x--;
echo "<br>";

//logical operator
$a = 100;  
$b = 50;

if ($a == 100 or $b == 80) {
    echo "Hello world!";
}


if ($a == 100 and $b == 80) {
    echo "Hello world!";
}
echo "<br>";
//condition assigement operator
echo $status = (empty($user)) ? "anonymous" : "logged in";
echo("<br>");

$user = "yuvraj";
echo $status = (empty($user)) ? "anonymous" : "logged in";
?>