<?php

 include '../dbconfig.php';
$cookie_name = "suser";
 

if(!isset($_COOKIE[$cookie_name])) 
    {
     echo "Cookie named '" . $cookie_name . "' is not set!";
    } else 
    {
     //echo "Cookie '" . $cookie_name . "' is set!<br>";
     //echo "Value is: " . $_COOKIE[$cookie_name];
$id=$_COOKIE[$cookie_name];//cookie value will come from this code




$org=$_POST["org"];
$dest=$_POST["dest"];
$sql = "insert into loc(org,dest,id) values('$org','$dest','$id')";
if($conn->query($sql) === TRUE)
{
header("Location: index.php");




}
else
{echo "error".$conn->error;}

}?>