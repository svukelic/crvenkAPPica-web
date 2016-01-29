<?php
// session_start();
include './baza.class.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');

	$upit="SELECT * FROM lovina";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("Id" => $nesto['idlovina'] , "Naziv" => $nesto['naziv']);

		}
	}
	else {
		$ispis = "profil_neuspjeh";
	}
	
	echo json_encode(array("list" => $data));
?>