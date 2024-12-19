<html>
    <head>
       <title> file demo</title>
    </head>
<body>
    <?php
    $myfile= fopen("newfile.txt","w") or die("file not found");
    //  echo $myfile;
    $txt = "yuvaj\n";
    fwrite($myfile, $txt);
    $txt = "jay\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    ?>
</body>
</html>