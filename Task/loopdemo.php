<html>
<body>
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                $p = $i * $j;
               
                    echo "<td>$j * $i= $p </td>";

            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>