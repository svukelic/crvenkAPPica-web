<?php
// session_start();
header('charset=utf-8');
include './baza.class.php';
$baza = new Baza();
$datum = date('Y-m-d H:i:s');

if (isset($_REQUEST['sezona'])) {
    $sezona = $_REQUEST['sezona'];
} else {
    $sezona = null;
}

if ($sezona != null){
	
	$upit="SELECT * FROM sezone WHERE idsezone ='$sezona'";
    $rezultat=$baza->selectDB($upit);
	
	while($nesto=$rezultat->fetch_array()){
		$sezona_info = array("Id" => $nesto['idsezone'], "Od" => $nesto['od'], "Do" => $nesto['do']);
	}
	
	$upit="SELECT * FROM sezone_has_lovina WHERE id_sezona ='$sezona'";
    $rezultat=$baza->selectDB($upit);
	
	while($nesto=$rezultat->fetch_array()){
		$lovina_info[] = array("Lovina" => $nesto['id_lovina']);
	}
	
	$enc1 = json_encode($sezona_info);
	$enc2 = json_encode($lovina_info);
	
	echo json_encode(array($sezona_info, $lovina_info));

}
else {
	$ispis = "Error";
	
	echo $ispis;
}

?>