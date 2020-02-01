<!DOCTYPE html>
<html>
<head>
	<title>pdf</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="Filename">

    <input type="submit">
</form>
</body>
</html>


<?php

try {
  $DB=mysqli_connect("localhost","root","","prjct");
  //$DB-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  echo "conx reussite à la BDD";

} catch (Exception $e) {
   echo " cnx faild  .$e->getmessage()";
}

$Filename=basename( $_FILES['Filename']['name']);

$target = "uploads/";
$target = $target . basename( $_FILES['Filename']['name']);

//This gets all the other information from the form



//Writes the Filename to the server
if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['Filename']['name']). " has been uploaded, and your information has been added to the directory";
    // Connects to your Database
 

    //Writes the information to the database
    mysqli_query($DB,"INSERT INTO fichier (Filename) VALUES  ('$target')") ;
    // $requete=$DB->query("INSERT INTO contact SET Filename=$Filename");
   
   // $requete=$DB->query("INSERT INTO contact SET file=$Filename");
   
} else {
    //Gives and error if its not
    echo "Sorry, there was a problem uploading your file.";
}


?>
