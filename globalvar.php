<?php

$x = 5; //global varibale

function myTest(){

    //show error not use global varibale inside the function
    global $x;
    echo "<p>hello varibale function inside use $x </p>";
}


myTest();//call function    

echo "outside function use variable  $x  ";


//static variable

function myTest1() {
    static $x = 0;
    echo $x;
    $x++;
  }
  
  myTest1();
  myTest1();
  myTest1();

$name = ' yuv';
function myTest2() {
  $name = 'vivek';
}
myTest2();
echo $name;


echo "<p>This ", "string ", "was ", "made ", "with multiple parameters.</p>";
?>