<?php
session_start();
include 'connect.php';
$nom = $mysql->real_escape_string($_POST['nom']);
$club = $mysql->real_escape_string($_POST['club']);
$event = $mysql->real_escape_string($_POST['event']);
$prenom = $mysql->real_escape_string($_POST['prenom']);
$descp = $mysql->real_escape_string($_POST['descp']);
$matricule = $mysql->real_escape_string($_POST['matricule']);
$annee = $mysql->real_escape_string($_POST['annee']);
$date_db = $mysql->real_escape_string($_POST['ddb']);
$date_fn = $mysql->real_escape_string($_POST['dfn']);
$id = $mysql->real_escape_string($_POST['id_user']);

if($id <> 1)
{$query = "UPDATE demande  SET nom='{$nom}',prenom='{$prenom}',year='{$annee}',matricule='{$matricule}',date_db='{$date_db}',date_fn='{$date_fn}',club='{$club}',event='{$event}',descp='{$descp}',id_user='{$_SESSION['id']}' WHERE id_demande=".$_SESSION['iddem']."; ";}
else
	{$query = "UPDATE demande SET date_db='{$date_db}', date_fn='{$date_fn}' WHERE id_demande = ".$_SESSION['iddem'].";";  }

if ($mysql->query($query)) {
	echo "New record created successfully\n";
} else {
	echo "\nError: " . $mysql->error;
}


if(isset($_POST['select']))
{
  $del="DELETE FROM salle_demande WHERE id_demande = ".$_SESSION["iddem"].";";

                                if ($mysql->query($del)) {
	echo "successfully\n";
} else {
	echo "\nError: " . $mysql->error;
}

$id =$_SESSION['iddem'];

  foreach ($_POST['select'] as $select)  
                { 

                	$qr ="INSERT INTO salle_demande(salle ,id_demande) VALUES ('{$select}','{$id}')";
       				 if ($mysql->query($qr) === TRUE) {
	echo "\nNew salle created \n";
} else {
	echo "\nError: \n" . $mysql->error;
}
}
}


$mysql->close();
header("refresh:4;url= info.php");


?>

