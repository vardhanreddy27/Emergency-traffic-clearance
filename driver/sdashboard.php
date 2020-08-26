<!DOCTYPE html>
<html>
<head>
  <title>
    maps
  </title>
</head>
<body><?php

include '../dbconfig.php';
$cookie_name = "suser";
 

if(!isset($_COOKIE[$cookie_name])) 
    {
     echo "Cookie named '" . $cookie_name . "' is not set!";
    } else 
    {
     //echo "Cookie '" . $cookie_name . "' is set!<br>";
     
$id=$_COOKIE[$cookie_name];//cookie value will come from this code




$sql = "SELECT * FROM drivdel WHERE id='$id'";

if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {

    $section= $row[0];
    echo "WELCOME   ".$section;
    ?><br><?PHP
    echo "ID: " . $_COOKIE[$cookie_name];

}}



}
 ?>
  <form id="form1" name="form1" method="post" action="index.php">
<label>orgin:<input type="text" name="org" id="org" />
</label>
<label>

destination:<input type="text" name="dest" id="dest" />
</label>
<input type="submit" name="button" id="button" value="submit " />

  </form>
</body>
</html>