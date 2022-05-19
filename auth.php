<?php
	session_start();
	require_once ('dbh.php');
	$empid = (isset($_GET['id']) ? $_GET['id'] : '');
	if(!isset($_SESSION["id"]))
	{
		header("Location: login.html");
		
	}
	elseif($_SESSION["id"] != $empid)
	{
		header("Location: login.html");
	}
	elseif($_SESSION["loggedin"] == false)
	{
		header("Location: login.html");
		exit();
	}
	?>
