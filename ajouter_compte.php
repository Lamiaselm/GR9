<?php
session_start();
try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");


} catch (Exception $e) {
 }



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
   
    echo "Sorry, there was a problem uploading your file.";
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
                echo '<div class="alert alert-success">La création du compte est faite avec succès !</div>';
            } else{
             //   echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($mysql);
}
if (!isset($_SESSION['loggedin'])) 
        header("Location: login.php");
        if($_SESSION['id']==1){
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="css/photos/logo123.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ajouter compte</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" href="css/login.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
        <style type="text/css"> 

  .dropdown-menu{
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
  </style>
</head>

<body>
  
<link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  


  <script type="text/javascript" src="js/bootstrap.js"></script>
  
  <script type="text/javascript"></script>
  
    <div class="wrapper"  style="background-image: url(css/photos/birds-cold-conifer-917494.jpg);">
 <div class="sidebar"  data-image="sidebar-5.jpg" style="background-image: url(css/photos/sidebar-5.jpg);" data-color='black'style="background-color: black">

     <div class="sidebar-wrapper">
                <div class="logo">
                      <?php
                     
                                                $query="SELECT * FROM accounts where id= ".$_SESSION['id']."; ";
                                                   if ($result=mysqli_query($DB,$query))
                                                    {
                                                        
                                                                
                                                    
                                                    while ( $row=mysqli_fetch_array($result))

                                                     {
                                                        
                   echo " <img class='img-circle' src=".$row[3]." width='180' style='margin-left: 40px'> ";         echo "<br>";
                echo "Welcome ".$row[4];} }

                      ?>
                  
                </div>
                <ul class="nav">
                  
               
                    <li>
                        <a class="nav-link" href="ajouter.php">
                            <i class="nc-icon nc-simple-add"></i>
                            <p>Ajouter réservation</p>
                        </a>
                    </li>
                   
                    <li>
                       
                         <a class='nav-link' href=stat.php>

                         
                            <i class="nc-icon    nc-chart-pie-36 "></i>
                            <p>Statistiques </p>
                               </a>
                        
                    </li>

                    <li id='lol'>

                        <a class="nav-link" href="ajouter_compte.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Ajouter compte</p>
                        </a>
                           <li>
                            
                   
                          <a class='nav-link' href="consulter.php">

                  
                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Consulter demande  </p>
                        </a>

                    </li>
                        
                    </li>
                       <li>
                          
                         <a class='nav-link' href="mes_res.php"> 

                       
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Mes réservations</p>
                        </a>
                    </li>
                          
                  
                 
                 
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
                  <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                    
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                         
                            <li class=" nav-item">
                                
                                <button class="btn btn-outline-secondary"" id="refresh" onclick="document.location.reload(false)">Rafraichir </button>
                              <!--  <button value="telecharger" onclick="window.location='uploads/fic00002.pdf';"><i class=" nc-cloud-download-93"></i></button> -->
                                                                                                                            
                              
                            </li>
                        
                        </ul>
                               <ul class="nav navbar-nav navbar-right heh">
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="nc-icon nc-bell-55 " style="font-size:18px;"></span></a>
                                     <ul class="dropdown-menu"></ul>
                                     </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                       
                    
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">

                                    <span class="btn btn-outline-danger"> Deconnexion </span>  </a>
                                                                                                      
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                     
                          <div class="card strpied-tabled-with-hover" id="card">




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
         
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
           
        </form>
            <div class="logomov3">
                            <!--   <img class="img" src="css/photos/esi.png" style="height: 120px; width: 120px;">
          
               &nbsp; &nbsp; &nbsp;
                  <img class="img" src="css/photos/logo4.png" style="height: 120px; width: 100px;">-->
     </div>

    </div>
             
                   </div>
              <script type="text/javascript" src="js/form.js"></script>

                        </div>
              
                    </div>
                
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="home.html">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                   
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                          , team 9
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<!-- <script src="assets/js/plugins/bootstrap-notify.js"></script> -->
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript" src="js/notif.js"></script>
<script src="assets/js/demo.js"></script>
<script src="js/notif.js" type="text/javascript"></script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script> -->

</html>
<script>
    $("#circle").Click( function click1() {
      window.location.href = "circle.php";
    } );

$(document).ready(function(){

  function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 
 load_unseen_notification();
 
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 3000);
 
});
</script>
</html>
<?php } else { header("Location: mes_res.php");}?>
