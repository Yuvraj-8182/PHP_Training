<?php
$oddArray = array();
$evenArray = array();
$threeDArray = array();

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        $evenArray[] = $i; 
    } else {
        $oddArray[] = $i; 
    }

    if ($i % 3 == 0 ) {
        $threeDArray[] = $i; 
    } 
}

echo "Odd Numbers:";
echo "<br>";
print_r($oddArray);
echo "<br>";
echo "<br>";
echo "Even Numbers:";
echo "<br>";
print_r($evenArray);
echo "<br>";
echo "<br>";
echo "3 division Numbers :";
echo "<br>";
print_r($threeDArray);



?>