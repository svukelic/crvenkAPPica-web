<?php
// session_start();
include './baza.class.php';
$baza = new Baza();
$datum = date('Y-m-d H:i:s');

if (isset($_REQUEST['UserName'])) {
    $UserName = $_REQUEST['UserName'];
} else {
    $UserName = null;
}
  
if (isset($_REQUEST['Password'])) {
    $Password = $_REQUEST['Password'];
} else {
    $Password = null;
}

if (($UserName != null) && ($Password != null)){
	$upit="SELECT * FROM user WHERE username='$UserName'";
    $rezultat=$baza->selectDB($upit);
    $nesto=$rezultat->fetch_array();
	
	if ($rezultat->num_rows!=0 && $nesto['password']==$Password){
		$upit_hash="SELECT * FROM hashbase WHERE naziv='login_uspjeh'";
		$rezultat_hash=$baza->selectDB($upit_hash);
		$dohvat=$rezultat_hash->fetch_array();
		$hash = $dohvat['vrijednost'];
	}
	else {
		$upit_hash="SELECT * FROM hashbase WHERE naziv='login_neuspjeh'";
		$rezultat_hash=$baza->selectDB($upit_hash);
		$dohvat=$rezultat_hash->fetch_array();
		$hash = $dohvat['vrijednost'];
	}
	 echo $hash;
}
else {
	$upit_hash="SELECT * FROM hashbase WHERE naziv='nepostojeci_korisnik'";
	$rezultat_hash=$baza->selectDB($upit_hash);
	$dohvat=$rezultat_hash->fetch_array();
	$hash = $dohvat['vrijednost'];
	
	echo $hash;
}

?>