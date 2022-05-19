<?php
session_start();
require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `employee` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

$empid = "";
if(mysqli_num_rows($result) == 1){
	
	$employee = mysqli_fetch_array($id);
	$empid = ($employee['id']);
	$_SESSION['id'] = $empid;
	$_SESSION['loggedin'] = true;
	
	header("Location: home.php?id=$empid");
}

else{
	$_SESSION['loggedin'] = false;
	echo ("<script>alert('Invalid Email or Password');
			window.location.href='javascript:history.go(-1)';
			</script>");
}
?>