<?php 

echo $_SERVER['PHP_SELF'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['HTTP_HOST'];

echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['SCRIPT_NAME'];

?>

<html>
<head>
    <title>Server Information</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
       Name:<input type="text" name="fname">
       <input type="submit"/>
      <br>
       <a href="demo.php?subject=PHP&web=W3schools.com">Test $GET</a>
</form>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // $name = $_REQUEST['fname'];
   $name =$_POST['fname'];
    if(empty($name)){
        echo "name is emty";
    }
    else{
        echo $name;
    }
}



?>
</body>            
</html>

