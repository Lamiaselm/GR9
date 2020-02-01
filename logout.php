<?php
session_start();
if (isset($_SESSION['loggedin'])) {
unset($_SESSION['name']);
unset($_SESSION['id']);
$_SESSION['loggedin']=False;
session_destroy();
header("Location: login.php");}
header("Location: login.php");


?>

