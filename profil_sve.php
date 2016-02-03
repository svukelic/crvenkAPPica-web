<?php
// session_start();
include './baza.class.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');

	$upit="SELECT * FROM user";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("id" => $nesto['iduser'], "Username" => $nesto['username'], "Ime" => $nesto['ime'], "Prezime" => $nesto['prezime'], "Dob" => $nesto['datum_rod']);

		}
	}
	else {
		$ispis = "profil_neuspjeh";
	}
	
	echo json_encode(array("list" => $data));
?>