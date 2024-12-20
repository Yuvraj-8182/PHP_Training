<?php
$inputFile = 'Csv_Task_Maiochi.csv'; 
$outputFile = 'output.csv'; 
$str = "Solitari, Anelli, Bracciali, Ciondoli, Collane, Collane E Pendenti,  Diamanti, Fedi E Fedine, Fermasoldi, Gemelli, Girocolli, Orecchini, Orologi, Portachiavi, Solitari, Spille, Charms, Componenti, OROLOGI, Girocolli Punto Luce, Girocolli con Diamanti, Girocolli con Pietre di Colore, Girocolli con Croci, Girocolli con Perle, Girocolli in Oro, Fili di Perle, Catene in Oro, Catene Uomo in Oro, Catene Donna in Oro, Collane Rosari, Bracciali Tennis, Bracciali con Diamanti, Bracciali Perle, Bracciali Oro, Bracciali con Zirconi, Bracciali con Pietre di Colore, Bracciali Uomo in Oro, Bracciali Uomo in Titanio, Bracciali Uomo Piastra, Bracciali Rosari, Bracciali per Bambini, Orecchini Punti Luce, Orecchini Pietre di Colore, Orecchini con Diamanti, Orecchini con Perle, Orecchini Oro, Orecchini Cerchi in Oro, Orecchini Oro Bambini, Anelli di fidanzamento, Fedine Eternity, Anelli Trilogy, Anelli con Diamanti, Anelli Pietre di Colore, Anelli Chevalier, Anelli Oro, Anelli Uomo, Medaglie Religiose, Ciondoli in oro, Croci Zodiaci, Iniziali e Numeri in Oro, Fedi Nuziali, Ciondolo Oro, Segni Zodiacali, Croci";

// Convert the string into an array
$strArray = array_map('trim', explode(',', $str));
$strArrayLength = count($strArray);

// Read the file
if (($handle = fopen($inputFile, 'r')) !== FALSE) 
{
    $data = [];

    $header = fgetcsv($handle, 1000, ',');
    $header[] = 'new_output';
    $data[] = $header; 

    while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) 
    { 
        
        if (isset($row[2])) 
        {
            $strArray2 = array_map('trim', explode(',', $row[2]));
            $strArrayLength2 = count($strArray2);

           
            $row['new_output'] = '';

            for ($i = 0; $i < $strArrayLength; $i++) 
            {
                for ($j = 0; $j < $strArrayLength2; $j++) 
                {
                    if ($strArray[$i] == $strArray2[$j]) 
                    {
                        $row['new_output'] .= $strArray2[$j] . ', '; 
                    }
                }
            }
            if (!empty($row['new_output'])) {
                $row['new_output'] = rtrim($row['new_output'], ', ');
            }
        }
        else 
        {
            $row['new_output'] = ''; 
        }

        $data[] = $row; 
    }
    fclose($handle);

    if (($outputHandle = fopen($outputFile, 'w')) !== FALSE) 
    {
        foreach ($data as $row) 
        {
            fputcsv($outputHandle, $row); 
        }
        fclose($outputHandle);

        echo "Filtered data has been written to $outputFile successfully.";
    } 
    else 
    {
        echo "Error opening the output file for writing.";
    }
} 
else 
{
    echo "Error opening the input file for reading.";
}
?>