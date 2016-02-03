<?php
// session_start();
include './baza.class.php';
$baza = new Baza();

header('charset=utf-8');

$datum = date('Y-m-d H:i:s');

if (isset($_REQUEST['UserName'])) {
    $UserName = $_REQUEST['UserName'];
} else {
    $UserName = null;
}

if ($UserName != null){
	$upit="SELECT * FROM user WHERE username='$UserName'";
    $rezultat=$baza->selectDB($upit);
    $nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0){
		echo json_encode(array("id" => $nesto['iduser'], "Ime" => $nesto['ime'], "Prezime" => $nesto['prezime'], "Dob" => $nesto['datum_rod'], "Status" => $nesto['status']), JSON_UNESCAPED_UNICODE);
	}
	else {
		$ispis = "profil_neuspjeh";
	}
	 echo $ispis;
}
else {
	$ispis = "profil_nepostojeci";
	
	echo $ispis;
}

?>