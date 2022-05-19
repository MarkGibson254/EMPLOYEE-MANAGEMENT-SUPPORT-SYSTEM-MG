<?php

require_once ('dbh.php');
$sql="SELECT * FROM `employee` WHERE 1";
$result = mysqli_query($conn, $sql);
$eid = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * from `employee` WHERE id=$eid";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $eid = mysqli_real_escape_string($conn, $_POST['id']);
  
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $province = mysqli_real_escape_string($conn, $_POST['province']);
  $emergencycontact = mysqli_real_escape_string($conn, $_POST['emergencycontact']);

    $result = mysqli_query($conn, "UPDATE `employee` SET `email`='$email',`contact`='$contact',`address`='$address',`province`='$province' `emergencycontact`=$emergencycontact WHERE id=$eid");
 
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Updated')
        </SCRIPT>");

  
}
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Redirecting to profile page')
    window.location.href='myprofile.php?id=$eid  ';
    </SCRIPT>");
?>