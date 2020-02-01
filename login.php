<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>

</head>
<body >
	<?php session_start();
		 if (isset($_SESSION['loggedin'])) 
        header("Location: consulter.php");
    ?>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	
	
</head>
<body id="login">
	<div class="frmlr shadow">
		<form action="auth.php" method="post">
			<h2 class="text-center">Se connecter</h2>  
			<hr>     
			<div class="form-group">
				<label for="user">Utilisateur</label>
				<input type="text" class="form-control" id="user" name="user" placeholder="Utilisateur/email" required>
			</div>
		
			<div class="form-group">
				<label for="pswrd">Mot de passe</label>
				<input type="password" class="form-control" id="pswrd" placeholder="Mot de pass" name="pswrd" required>
			</div>
			
			<div >
				<label for="chk" class="form-checkbox-label"><div class="form-check"><input class="form-check-input" id="chk" type="checkbox">Rester connecté</div></label>
				<br>
				<a href="reset_pass.html" class="pull-right">Mot de pass oublié ?</a> <br>
					<a href="home.html" class="pull-right">Revenir à l'accueil</a>
			</div>  
			<div class="form-group">
				<button type="submit" id="but" class="btn btn-primary btn-block">Se connecter</button>
			</div>  

			     <div class="logomov3">
                              
          
               &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                  <img  class="img" src="css/photos/logo4.png" style="height: 120px; width: 100px;">
     </div>
		</form>
	</div>

</body>
</html>