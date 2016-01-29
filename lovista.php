<?php
// session_start();
include './baza.class.php';
include './replace_unicode.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');


if (isset($_REQUEST['zupanija'])) {
    $zupanija = $_REQUEST['zupanija'];
} else {
    $zupanija = null;
}

if ($zupanija != null){
	$upit="SELECT * FROM lovista WHERE zupanija='$zupanija'";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("Id" => $nesto['idlovista'] , "Naziv" => $nesto['naziv'], "Zupanija" => $nesto['zupanija']);

		}
	}
	else {
		$ispis = "Error";
	}
}
else{
	$upit="SELECT * FROM lovista";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("Id" => $nesto['idlovista'] , "Naziv" => $nesto['naziv'], "Zupanija" => $nesto['zupanija']);

		}
	}
	else {
		$ispis = "Error";
	}
}

	echo unicode_decode(json_encode(array("list" => $data)), ENT_SUBSTITUTE);
?>