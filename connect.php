<?php 

$server="localhost";
$username="root";
$password="";
$db="gestion_des_salles";


$mysql=mysqli_connect($server,$username,$password,$db);

if ($mysql->connect_error) {
	die("Connection echoué: " . $mysql->connect_error);
} 

?>