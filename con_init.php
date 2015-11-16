<?php
// session_start();
include './baza.class.php';
$baza = new Baza();
$datum = date('Y-m-d H:i:s');

// $upit_hash="SELECT * FROM hashbase WHERE naziv='uspostava_veze'";
// $rezultat_hash=$baza->selectDB($upit_hash);
// $dohvat=$rezultat_hash->fetch_array();
// $hash = $dohvat['vrijednost'];

echo "dostupno";

?>