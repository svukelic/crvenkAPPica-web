<?php
include './baza.class.php';
$baza = new Baza();
$json = $_GET['json'];
$data = json_decode($json, true);
$id = $data['id'];
$date = date('Y-m-d H:i:s');
$naziv = $data['title'];
//echo $naziv;
//$result = $data1 . $data2;
$url1 = 'http://www.redtesseract.sexy/crvenkappica/images/';
$url = $url1.$naziv;
//echo $url;
$upit = "insert into slike (datum_dodan, link, user_iduser) values ('$date','$url', '$id')";
if($baza->updateDB($upit)){
	$rezultat = "uspjeh";
} else{
        $greska = 3;
	$rezultat = "greska prilikom upisa";
}
echo $rezultat;
 ?>