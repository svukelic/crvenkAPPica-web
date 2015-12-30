<?php
include './baza.class.php';
$baza = new Baza();
$id = $_GET["id"];
//echo $id;
$upit="SELECT * FROM slike WHERE user_iduser='$id'";
$rezultat=$baza->selectDB($upit);

$data = array();
		while($nesto=$rezultat->fetch_array()){
			$data[] = array("Link" => $nesto['link']);
		}
	
echo json_encode(array("List" => $data));
?>
