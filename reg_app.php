<?php
include './baza.class.php';
$baza = new Baza();

$json = $_GET['json'];
$data = json_decode($json, true);
$name = $data['Name'];
$lastname = $data['Lastname'];
$username = $data['Username'];
$password = $data['Password'];
$dob = $data['DOB'];
$email = $data['Email'];

$greska = 0;
$rezultat = "error";

$upit = "select * from user where username ='".$username."'";
$rezultat_korime = $baza->selectDB($upit);
        
if($rezultat_korime->num_rows != 0){
	$greska = 1;
	$rezultat = "username exists";
}

$upit = "select * from user where email ='".$email."'";
$rezultat_email = $baza->selectDB($upit);
        
if($rezultat_email->num_rows != 0){
	$greska = 2;
	$rezultat = "email taken";
}

if($greske == 0){

			$upitB = "insert into user(ime, prezime, email, username, password, datum_rod, tip_korisnika_idtip_korisnika)"."values ('$name','$lastname','$email','$username','$password','$dob', 1)";
            
            if($baza->updateDB($upitB)){
				$rezultat = "uspjeh";
            } else{
                $greska = 3;
				$rezultat = "greska prilikom upisa";
            }
}

echo $rezultat;

?>