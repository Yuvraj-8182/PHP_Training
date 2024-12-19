<?php
function p($rows) 
{
    $triangle = [];

    for ($i = 0; $i < $rows; $i++) 
    {
        $triangle[$i] = [];

        for ($j = 0; $j <= $i; $j++) 
        {
            if ($j == 0 || $j == $i) 
            {
                $triangle[$i][$j] = 1; 
            } else 
            {
                $triangle[$i][$j] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
            }
        }
    }
    echo "<div style='text-align: center; font-family: Arial;'>";
    foreach ($triangle as $row) 
    {
        echo "<div style='display: flex; justify-content: center;'>";
        foreach ($row as $value) 
        {
            echo "<div style='width:100px;height: 60px;margin: 0;background-color: green;color: white;display: flex;align-items: center; 
            border: 5px solid black;
            justify-content: center;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            '>";
            echo $value;
            echo "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}
p(5);
?>




