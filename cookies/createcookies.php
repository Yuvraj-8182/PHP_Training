<?php
$cookies_name = "user";
$cookies_value= "yuvraj";
setcookie($cookies_name,$cookies_value,time()+(86400*3),"/");
?>
<html>
    <head>
        <title>cookies demo</title>
    </head>
    <body>
        <?php 
        if(!isset($_COOKIE[$cookies_name])){
                echo "cookies named'".$cookies_name."'is not set";
        }else{
            echo "cookies named '".$cookies_name."' is set!";
            echo "cookies value ".$_COOKIE[$cookies_name];
       }
        ?>
    </body>
</html>