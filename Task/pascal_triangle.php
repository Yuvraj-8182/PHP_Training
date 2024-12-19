<?php
$n = 10; 
$t = [];

for ($i = 0; $i < $n; $i++) 
{
    for ($k = 0; $k < $n - $i - 1; $k++) 
    {
        echo "&nbsp;&nbsp;";
    }
    for ($j = 0; $j <= $i; $j++) 
    {
        if ($j == 0 || $j == $i) 
        {
            $t[$i][$j] = 1;
        } 
        // else 
        // {
        //     $t[$i][$j] = $t[$i-1][$j-1] +  $t[$i-1][$j];
        // }
        echo $t[$i][$j] . "   ";
    }
    echo "<br>";
}
?>
