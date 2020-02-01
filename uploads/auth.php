<?php
session_start();
include "connect.php";

if ( !isset($_POST['user'], $_POST['pswrd']) ) {
	
	die ('empty');}

	if ($stmt = $mysql->prepare('SELECT passwrd FROM accounts WHERE user= ?')) {
		$stmt->bind_param('s', $_POST['user']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($password);
			$stmt->fetch();
		if (password_verify($_POST['pswrd'],$password)){ //password_verify with password_hash  
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['user'];
			$usr=$_POST['user'];
			$result = mysqli_query($mysql,"SELECT id FROM accounts WHERE user='".$usr."'");
			if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			$row = mysqli_fetch_assoc($result);
			$id=$row['id'];

			$_SESSION['id'] = $id;
			
			echo $id.'\n';
			echo 'Welcome ' . $_SESSION['name'] . '!';
			header("Location: consulter.php");

		} 
		else { ?>

			<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
	  <style >
	#mdp:invalid { 
  border: 2px solid red;
}";

</style>

</head>
<body >

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	
</head>
<body id="login">
	<div class="frmlr ">
		<form action="auth.php" method="post">
			<h2 class="text-center">Se connecter</h2>  
			<hr>     
			<div class="form-group">
				<label for="user">Utilisateur</label>
				<input type="text" class="form-control" id="user" name="user" placeholder="Utilisateur/email" required="required" value="<?php echo $_POST['user'];?>">
			</div>
		
			<div class="form-group">
				<label for="pswrd">Mot de pass</label>
				<input id="mdp" type="password" class="form-control" id="pswrd" placeholder="enter a correct passwrd" name="pswrd" required="required">
			</div>
			
			<div >
				<label for="chk" class="form-checkbox-label"><div class="form-check"><input class="form-check-input" id="chk" type="checkbox">Rester connecté</div></label>
				<br>
				<a href="reset_pass.html" class="pull-right">Mot de pass oublié ?</a>
			</div>  
			<div class="form-group">
				<button type="submit" id="but" class="btn btn-primary btn-block">Se connecter</button>
			</div>      
			     <div class="logomov3">
                              
          
               &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                  <img  class="img" src="css/photos/logo4.png" style="height: 120px; width: 100px;">
     </div>
		</form>
	</div>

</body>
</html>
			
			 
			
		<?php
		}
	} else {?>
		 <!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
	  <style >
	#us:invalid { 
  border: 2px solid red;
}";

</style>

</head>
<body >

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	
</head>
<body id="login">
	<div class="frmlr ">
		<form action="auth.php" method="post">
			<h2 class="text-center">Se connecter</h2>  
			<hr>     
			<div class="form-group">
				<label for="user">Utilisateur</label>
				<input id="us" type="text" class="form-control" id="user" name="user" placeholder="enter a correct username" required="required" >
			</div>
		
			<div class="form-group">
				<label for="pswrd">Mot de pass</label>
				<input  type="password" class="form-control" id="pswrd" placeholder="enter passwrd" name="pswrd" required="required">
			</div>
			
			<div >
				<label for="chk" class="form-checkbox-label"><div class="form-check"><input class="form-check-input" id="chk" type="checkbox">Rester connecté</div></label>
				<br>
				<a href="reset_pass.html" class="pull-right">Mot de pass oublié ?</a>
			</div>  
			<div class="form-group">
				<button type="submit" id="but" class="btn btn-primary btn-block">Se connecter</button>
			</div>      
			     <div class="logomov3">
                              
          
               &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                  <img  class="img" src="css/photos/logo4.png" style="height: 120px; width: 100px;">
     </div>
		</form>
	</div>

</body>
</html>
<?php
	}
	$stmt->close();
}
mysqli_close($mysql);

?> 










