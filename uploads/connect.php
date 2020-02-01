<?php

$server="localhost";
$username="root";
$password="";
$db="gestion_des_salles";

$mysql=mysqli_connect($server,$username,$password,$db);

if ($mysql->connect_error) {
    die("Connection echoué: " . $mysql->connect_error);
} 

$nom = $mysql->real_escape_string($_POST['nom']);
$club = $mysql->real_escape_string($_POST['club']);
$event = $mysql->real_escape_string($_POST['event']);
$prenom = $mysql->real_escape_string($_POST['prenom']);
$descp = $mysql->real_escape_string($_POST['descp']);
$matricule = $mysql->real_escape_string($_POST['matricule']);
$annee = $mysql->real_escape_string($_POST['annee']);
$date_db = $mysql->real_escape_string($_POST['date_db']);
$date_fn = $mysql->real_escape_string($_POST['date_fn']);
$Filename=basename( $_FILES['Filename']['name']);

$target = "uploads/";
$target = $target . basename( $_FILES['Filename']['name']);
if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
    
    echo "The file ". basename( $_FILES['Filename']['name']). " has been uploaded, and your information has been added to the directory";
   
} else {
   
    echo "Sorry, there was a problem uploading your file.";
}


$query = "INSERT INTO demande (nom, prenom,year,matricule, date_db, date_fn,Filename,club,event,descp)
			VALUES ('{$nom}','{$prenom}','{$annee}','{$matricule}','{$date_db}','{$date_fn}','{$target}' ,'{$club}','{$event}','{$descp}')";
			
if ($mysql->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $mysql->error;
}
$mysql->close();


?>

