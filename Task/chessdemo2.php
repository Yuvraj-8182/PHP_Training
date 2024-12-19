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
        for ($row = 1; $row <= 9; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= 9; $col++) {
                if (
                    $row == $col || $col == (10-$row) || 
                    ($row == 1 || $row == 8) && ($col == 1 || $col == 9) || 
                    ($row == 2 || $row == 7) && ($col == 1 || $col == 2 || $col == 9 || $col == 8) ||
                    ($row == 3 || $row == 6) && ($col == 1 || $col == 2 || $col == 3 || $col == 7 || $col == 8 || $col == 9) ||
                    ($row == 4 || $row == 5) && ($col == 1 || $col == 2 || $col == 3 || $col == 4 || $col == 6 || $col == 7 
                    || $col == 8 || $col == 9)
                ) {
                    echo "<td>*</td>"; 
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
<?php



