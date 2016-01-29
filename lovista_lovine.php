<?php
// session_start();
include './baza.class.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');

	$upit="SELECT * FROM lovista_has_lovine";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("Loviste" => $nesto['lovista_idlovista'] , "Lovina" => $nesto['lovina__idlovina']);

		}
	}
	else {
		$ispis = "profil_neuspjeh";
	}
	
	echo json_encode(array("list" => $data));
?>