
<?php

include('connect.php');
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";




 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

 /*TRIM() permet de supprimer les caractères invisibles, c’est-à-dire les caractères tels que l’espace, la tabulation, le retour à la ligne ou bien même le retour chariot. Une telle fonction peut se révéler utile pour économiser de l’espace dans une base de données ou pour afficher proprement des données.*/

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE user= ?";
        
        if($stmt = mysqli_prepare($mysql, $sql)){  
            // Bind variables to the prepared statement as parameters  
            // mysqli_stmt_bind_param: Lie des variables à une requête MySQL
            mysqli_stmt_bind_param($stmt, "s", $param_username);  //s: correspond à une variable de type chaîne de caractères
           
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    $nom_club=$_POST['nom_club'];
    // echo $target;
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $Filename=basename( $_FILES['Filename']['name']);
      $target = "uploads/";
$target = $target . basename( $_FILES['Filename']['name']);
if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {
    
  //  echo "The file ". basename( $_FILES['Filename']['name']). " has been uploaded, and your information has been added to the directory";
   
} else {
   
  //  echo "Sorry, there was a problem uploading your file.";
}
        $sql = "INSERT INTO accounts (user, passwrd,Filename,username) VALUES (?, ?,'{$target}','{$nom_club}')";
         
        if($stmt = mysqli_prepare($mysql, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: login.php");
                echo '<div class="alert alert-success">Thank You! I will be in touch</div>';
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($mysql);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <style type="text/css">
        .frmlr{
           
        height: 600px;
        }
    </style>
</head>
<body id="reg">
    <div class="frmlr ">
        <h2 class="text-center">Ajouter Compte</h2>

        <hr>
        <!-- <form action="login.php" method="post"> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" action="connect.php" method="post" enctype="multipart/form-data" role="form">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  
              <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="nom_club" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
                 <div class="form-group ">
                <label>Inserez votre logo</label>
                <input type="file" name="Filename" class="form-control" >
                
            </div>
            <div>
                <a class="" href="forgot.php">Oublier compte ?</a>
            </div>
            <div class="">
                <label for="remember-me">Remember me</label>
                <input type="checkbox" name="remember-me" id="remember-me">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
            <div class="logomov3">
                               <img class="img" src="css/photos/esi.png" style="height: 120px; width: 120px;">
          
               &nbsp; &nbsp; &nbsp;
                  <img class="img" src="css/photos/logo4.png" style="height: 120px; width: 100px;">
     </div>

    </div>    
</body>
</html>