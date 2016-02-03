<?php
include './baza.class.php';
$baza = new Baza();

$username = $_GET['Username'];
$status = $_GET['Status'];

$rezultat = "Error";

$upitB = "UPDATE user SET status='$status' where username='$username'";
            
if($baza->updateDB($upitB)){
	$rezultat = "uspjeh";
} else{
	$rezultat = "Error";
}

echo $rezultat;

?>