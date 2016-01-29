<?php
// session_start();
header('charset=utf-8');
include './baza.class.php';
$baza = new Baza();
$datum = date('Y-m-d H:i:s');

header('charset=utf-8');

if (isset($_REQUEST['sezona'])) {
    $sezona = $_REQUEST['sezona'];
} else {
    $sezona = null;
}

if ($sezona != null){
	
	$upit="SELECT * FROM sezone_has_lovina WHERE id_sezona ='$sezona'";
    $rezultat=$baza->selectDB($upit);
	
	while($nesto=$rezultat->fetch_array()){
		$temp = $nesto['id_lovina'];
		$upit2="SELECT * FROM lovina WHERE idlovina ='$temp'";
		$rezultat2=$baza->selectDB($upit2);
		$nesto2 = $rezultat2->fetch_array();
		
		$sezona_info[] = array("Lovina" => $nesto['id_lovina'], "Naziv" => $nesto2['naziv'], "Link" => $nesto2['link']);
	}
	
	echo json_encode($sezona_info);

}
else {
	$ispis = "Error";
	
	echo $ispis;
}

?>