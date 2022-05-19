<?php
//connection to the database
$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "project";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

//else if database does not exist or wrong database name or an error occured
if(!$conn){
	echo "Databese Connection Failed";
}

?>