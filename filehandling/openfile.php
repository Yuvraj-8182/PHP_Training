<html>
    <head>
       <title> file demo</title>
    </head>
<body>
    <?php
    $myfile= fopen("demo.txt","r") or die("file not found");
    //  echo $myfile;
    echo fgets($myfile);
    
    ?>
</body>
</html>