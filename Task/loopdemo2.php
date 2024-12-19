<html>
<body>
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                $p = $i * $j;
                if ($j == $i || $j == (11-$i)) 
                {
                    echo "<td></td>"; 
                }   
                else 
                {
                    echo "<td>$j * $i = $p</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>