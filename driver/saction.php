	

<?php

 include '../dbconfig.php';

$email=$_POST["email"];
$psw=$_POST["psw"];

$psw= md5($psw);

	$result = mysqli_query($conn,"SELECT * FROM drivdel WHERE email='$email' and psw = '$psw'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		echo "Invalid Username or Password!";
		
header("Location:signup.php?errorMssg=".urlencode("Invalid Username or Password!"));
	} 

else {
		echo "You are successfully authenticated!";

$sql = "SELECT * FROM drivdel WHERE email='$email'";
if ($result=mysqli_query($conn,$sql))
  {
  
  //Fetch one and one row
  
  while ($row=mysqli_fetch_row($result))
    {

$id= $row[3];
	
    }


                $cookie_name="suser";
                $cookie_value=$id;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];


                
  
}


mysqli_close($conn);
                header("Location: sdashboard.php");
                

	}



?>





