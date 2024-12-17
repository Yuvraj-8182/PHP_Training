<?php
function mytest(){
    echo "hello world!";
}
mytest();
echo "<br><br>";

//with aurg
function students($name,$year){
    echo "$name born year $year <br>";
}

students("yuvraj","2001");
students("om","2001");
students("ishita","2003");
students("vivek","2002");

echo "<br>";

//defualt values 
function setHeight($minheight = 50) {
    echo "The height is : $minheight <br>";
  }
  
  setHeight(350);
  setHeight(); // will use the default value of 50
  setHeight(135);
  setHeight(80);

//return values

// function sum($x, $y) {
//     $z = $x + $y;
//     return $z;
//   }
  
//   echo "10 + 20 = " . sum(10, 20) . "<br>";
//   echo "5 + 20 = " . sum(5, 20) . "<br>";
//   echo "50 + 20 = " . sum(50, 20);

//   //pasing arguments by reference
// echo "<br>";
//   function add_five(&$value) {
//     $value += 5;
//   }
  
//   $num = 2;
//   add_five($num);
//   echo $num;

 echo "<br>";

// function addNumbers(int $a, int $b) {
//     return $a + $b;
//   }
//   echo addNumbers(5, "5 days");
?>