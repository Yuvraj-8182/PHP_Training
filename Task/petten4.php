<html>
<head>
    <style>
        table {
            width: 300px; 
            border-collapse: collapse;
        }
        td {
            width: 30px; 
            height: 30px; 
            text-align: center; 
        }
    </style>
</head>
<body>
    <table border="1">
        <?php
        for ($row = 1; $row <= 10; $row++) 
        {
            echo "<tr>";
            for ($col = 1; $col <= 10; $col++) 
            {
                    $p = $row * $col;
                    echo "<td>$p</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
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
            echo "<div style='width: 50px; height: 40px; margin: 2px; background-color: green; color: white; display: flex; align-items: center; justify-content: center;'>";
            echo $value;
            echo "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}

p(5);
?>





