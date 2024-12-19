<?php

$inputFile = 'proprice.csv'; 
$outputFile = 'output.csv'; 


function random_pass($length = 12)
{
    return bin2hex(random_bytes($length/2));
}

// Read the file
if (($handle = fopen($inputFile, 'r')) !== FALSE) 
{
    $data = [];

    $header = fgetcsv($handle, 1000, ',');
    $header[] = 'Encrypt_Number';
    $header[] = 'Password';
    $header[] = 'indlude_tax_price';
    $header[] = 'Create_date';

    $data[] = $header; 

    while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) 
    { 
        if (isset($row[1]) && strpos($row[1], 'DR10') !== false) //filter "DR10"
        {
            if (isset($row[3]) || isset($row[11])) 
            {

                $row[11] = round((int)$row[11],2); //round 


                $timestamp = (int)$row[3]; //date formate
                $date = DateTime::createFromFormat('U', $timestamp); 
                if ($date) 
                {
                    $row[3] = $date->format('d-m-y');
                }

            }

            //password 
            if(isset($row[1]))
            {
                   $row['Encrypt_Number'] = md5($row[11]) ;
            }
            else{
                $row['Number'] = ' ';
            }
            $row['password'] = random_pass();
            

            //include taxs 25%
            if(isset($row[13]))
            {
                 $price_with_taxs = (float)$row[13];
                 $include_tax = round($price_with_taxs * 1.25,2);
                 $row['indlude_tax_price'] = $include_tax;
            }
            //create date
            $row['Create_date'] = date('Y-m-d h:i:sa');
            $data[] = $row; 
        }
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