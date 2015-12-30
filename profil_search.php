<?php
// session_start();
include './baza.class.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');

if (isset($_REQUEST['ime'])) {
    $ime = $_REQUEST['ime'];
} else {
    $ime = null;
}

$pieces = explode(" ", $ime);

	$upit="SELECT * FROM user WHERE ime='$pieces[0]' OR prezime='$prezime[1]'";
    $rezultat=$baza->selectDB($upit);
    //$nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		$data = array();
		while($nesto=$rezultat->fetch_array()){
		
			$data[] = array("Username" => $nesto['username'], "Ime" => $nesto['ime'], "Prezime" => $nesto['prezime'], "Dob" => $nesto['datum_rod']);

		}
	}
	else {
		$ispis = "profil_neuspjeh";
	}
	
	echo json_encode(array("list" => $data));
?>