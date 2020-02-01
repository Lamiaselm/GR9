<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");

   $query="SELECT * from accounts where user='$email'";
    if ($result=mysqli_query($DB,$query))
     { 
 
    ?>
  <head>
    <style >
  
#newmdp { 
  background: url(css/photos/info.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>

<body id="newmdp">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
</head>
<body id="pas">
  <div class="frmlr  ">
    <form action="submit_new.php" method="post">
      <h2 class="text-center">Nouveau mot de passe  </h2>  
      <hr>     
      <div class="form-group">
        <label for="user">Votre nouveau mot de passe  </label>
         <input type="text" class="form-control" id="user" name="email" placeholder="password" required="required" value="<?php echo $email;?>">
        <input type="password" class="form-control" id="user" name="password" placeholder="password" required="required">
          
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit_password">Envoyer</button>
      </div>      
    </form>
  </div>

</body>
    <?php
  }
}
?>



