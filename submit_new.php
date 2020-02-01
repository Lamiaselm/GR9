<?php
if(isset($_POST['submit_password']))
{ 

  $email=$_POST['email'];
  $passs=$_POST['password'];
  $pass=Password_hash($passs,PASSWORD_DEFAULT);
  echo $email;

  echo $pass ;
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");
  $query="UPDATE accounts set passwrd='$pass' where user='$email'";
  if ($result=mysqli_query($DB,$query)) { echo "<div class='alert alert-success'> Votre mot de passe a été bien modifier  !</div>'";;
  	# code...
  }
}
?>
<head>
  <style >
  
#submit_new { 
  background: url(css/photos/nouveau.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>

<body id="submit_new">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body id="pas">
  <div class="frmlr  shadow">
    <form action="submit_new.php" method="post">
      <h2 class="text-center">Veuillez vous reconnecter à votre compte  </h2>  
      <hr>     
      <div class="form-group">
        <label for="user"> <a href="login.php">Go to login</a>  </label>
       
      </div>
      
           
    </form>
  </div>

</body>