<?php
echo '<style>
        .chessboard {   
            width: 27%;
            border: 4px solid black;
            display: grid;
            grid-template-columns: repeat(8, 51px);
            grid-template-row: repeat(8,51px);
        }
        .white {
            background-color: white;
        }
        .black {
            background-color: black;
        }
        .red {
            background-color:red;
         }
      </style>';

echo '<div class="chessboard">';
for ($row = 1; $row <=8; $row++) 
{
    for ($col = 1; $col <=8; $col++) 
    {
        if($row == $col || $col == (9 -$row))
        {
              echo '<div class="red"></div>';
        }
        else{
        $color = ($row + $col) % 2 == 0 ? 'white' : 'black';
        echo '<div class="' . $color . '" style="width: 53px; height: 50px;"></div>';
        }
    }
}
echo '</div>';
?>