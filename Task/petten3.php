<?php
for( $i = 1; $i <=5; $i++ )
{
    for($k =$i; $k <=5; $k++ )
    {
           echo "$i";
    }
    for($r = 5; $r<=$i+3; $r++)
    {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    for($t =$i; $t<=5; $t++ )
    {
           echo "$i";
    }
    echo "<br>";
}
for( $i = 1; $i <=4; $i++)
{
    for($k=4-1; $k <=$i+3; $k++)
    {
           echo "$i";
    }
    for($t = $i; $t<=4-1; $t++)
    {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    for($r=4-1; $r<=$i+3; $r++)
    {
        echo "$i";
    }
    echo "<br>";
}
?>