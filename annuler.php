<?php


include 'connect.php'; 

if(isset($_GET["dem"])) { 

	
  $q="DELETE FROM salle_demande WHERE id_demande = ".$_GET["dem"].";";
 if ($mysql->query($q)) {
	$q="DELETE FROM demande WHERE id_demande = ".$_GET["dem"].";";
 				if ($mysql->query($q)) {
	
	echo "<img src='css/photos/check.png' style='display: block;margin-left: auto;margin-right: auto;'>";
 	header("refresh: 1;url= mes_res.php");
} else {
	echo "\nError: " . $mysql->error;
}

}
} else {
	echo "\nError: " . $mysql->error;
	echo "<img src='css/photos/cross.png' style='display: block;margin-left: auto;margin-right: auto;'>\nError: " . $mysql->error;
		header("refresh: 1;url=mes_res.php");
}

  

?>
	