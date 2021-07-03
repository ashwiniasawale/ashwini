<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//error_reporting(E_All);
 //echo 'hii';
 $db_username = 'root';
 $db_password = '';
 $db_name = 'patient';
 $db_host = 'localhost';
     
$mysqli = mysqli_connect($db_host, $db_username, $db_password,$db_name);
 
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
else
{
echo 'connected successfully';
}
*/
?>

	
      
