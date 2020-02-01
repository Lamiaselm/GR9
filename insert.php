<?php
session_start();
include 'connect.php';

$nom = $mysql->real_escape_string($_POST['nom']);
$mail = $mysql->real_escape_string($_POST['mail']);
//$club = $mysql->real_escape_string($_POST['club']);
$event = $mysql->real_escape_string($_POST['event']);
$prenom = $mysql->real_escape_string($_POST['prenom']);
$descp = $mysql->real_escape_string($_POST['descp']);
$matricule = $mysql->real_escape_string($_POST['matricule']);
$annee = $mysql->real_escape_string($_POST['annee']);
$date_db = $mysql->real_escape_string($_POST['date_db']);
$date_fn = $mysql->real_escape_string($_POST['date_fn']);
$Filename=basename( $_FILES['Filename']['name']);

$target = "uploads/";
$target = $target . basename($_FILES['Filename']['name']);
$query1 = "SELECT * FROM accounts WHERE id = ".$_SESSION['id'].";";
$result = mysqli_query($mysql,$query1);
$row = mysqli_fetch_array($result);
$club = $row[4];
if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {

	$query = "INSERT INTO demande (nom, prenom,year,matricule, date_db, date_fn,Filename,club,event,descp,mail,id_user)
VALUES ('{$nom}','{$prenom}','{$annee}','{$matricule}','{$date_db}','{$date_fn}','{$target}' ,'{$club}','{$event}','{$descp}','{$mail}','{$_SESSION['id']}')";
if ($mysql->query($query)) {

	$q="SELECT id_demande FROM demande WHERE (nom='{$nom}') AND (prenom='{$prenom}') AND (year='{$annee}') AND (matricule='{$matricule}') AND (date_db='{$date_db}') AND (date_fn='{$date_fn}') AND (Filename='{$target}')";

$r=$mysql->query($q)  or die($mysql->error);;
$col = $r->fetch_assoc();
$id =(int)$col['id_demande'];

foreach ($_POST['select'] as $select)  
{
	$qr ="INSERT INTO salle_demande(salle ,id_demande) VALUES ('{$select}','{$id}')";
	if ($mysql->query($qr) === TRUE) {
		$bol=TRUE;
	} else {
		$bol=false;
		echo "\nError: \n" . $mysql->error;
		echo "<img src='css/photos/cross.png' style='display: block;margin-left: auto;margin-right: auto;'>\nError: " . $mysql->error;
		header("refresh: 1;url= formulaire.php");
	}
}
if($bol)
{
 	echo "<img src='css/photos/check.png' style='display: block;margin-left: auto;margin-right: auto;'>";
 	header("refresh: 1;url= mes_res.php");
}


	
} else {
	echo "<img src='css/photos/cross.png'style='display: block;margin-left: auto;margin-right: auto;'>\nError: " . $mysql->error;
	header("refresh: 1;url= formulaire.php");
}
} else {

	echo "<img src='css/photos/cross.png' style='display: block;margin-left: auto;margin-right: auto;'>\nError: " . $mysql->error;
	header("refresh: 1;url= formulaire.php");
}




$mysql->close();


?>

