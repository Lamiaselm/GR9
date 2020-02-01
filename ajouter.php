
<?php
session_start();
try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");


} catch (Exception $e) {
 
} 

if (!isset($_SESSION['loggedin'])) 
        header("Location: login.php");


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="css/photos/logo123.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ajouter réservation</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
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
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
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
                    <?php if($_SESSION['id']==1)  {?>
                                    <li>
                       
                         <a class='nav-link' href=stat.php>

                         
                            <i class="nc-icon    nc-chart-pie-36 "></i>
                            <p>Statistiques </p>
                               </a>
                        
                    </li>

                    <li>
                        <a class="nav-link" href="ajouter_compte.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Ajouter compte</p>
                        </a>
                    </li>
                       
                           <li>
                            
                      
                         <a class='nav-link' href="consulter.php"> 

                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Consulter demande  </p>
                        </a>
                    </li>

                    <?php }?>

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
                        <div class="col-md-8">
                          <div class="card strpied-tabled-with-hover" id="card">
                        <div class="panel panel-default shadow container euh" >
      
    <form class="frmlr" id="frm" name="euh" enctype="multipart/form-data" action="insert.php" method="POST">
      <div class="sticky-top " style="background-color: #ffffffff;">
      <legend class="display-4 text-center">Reservation</legend>
      <hr>
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>

    </div>
      <div class="etape">
      <div class="form-group">
        <label  for="nom">Nom</label>
        <input class="form-control" type="text" name="nom" placeholder="nom" required pattern="[A-Za-z]{1,15}">
        <small class="form-text text-muted">ne depasse pas 15 characters</small>    
      </div>
        <hr>
      <div class="form-group">
        <label for="prenom">Prenom</label>
        <input class="form-control" type="text" name="prenom" placeholder="prenom" required pattern="[A-Za-z]{1,20}">
        <small class="form-text text-muted">ne depasse pas 20 characters</small>
      </div><hr>
      <div class="form-group">
        <label for="matricule">Matricule</label>
        <input class="form-control" type="text" name="matricule" placeholder="matricule" required pattern="[A-Za-z0-9]{1,12}">
        <small class=" form-text text-muted">ne depasse pas 12 characters </small>
      </div class="form-group"><hr>
      <div class="form-group">
        <label for="annee">Annee</label>
       <select name="annee" id="annee" tabindex="5">
          <option value="">Choisir le niveau</option>
          <optgroup label="niveau">
            <option value="1CP">1CP</option>
            <option value="2CP">2CP</option>
            <option value="1CS">1CS</option>
            <option value="2CS">2CS</option>
            <option value="3CS">3CS</option>
          </optgroup>
        </select>
      </div><hr>

      <div class="form-group">
        <label for="event">Evenement</label>
        <input  class="form-control" type="text" name="event"placeholder="event" required pattern="[A-Za-z0-9]{1,255}"></div>
      <div class="form-group">
        <label for="descp">Description</label>
        <input class="form-control"type="text" name="descp" placeholder="description" required pattern="[A-Za-z0-9]{1,255}"></div>
      <hr>
      <div class="form-group">
        <label for="mail">Email</label> 
        <div class="input-group">
        <input class="form-control" type="email" name="mail" placeholder="email" required ></div></div><hr>
      <div class="custom-file"><label class="custom-file-label" for="Filename">Fichier</label>
        <input class="custom-file-input" type="file" name="Filename" >
        <small class="form-text text-muted">Taille maximale du ficher 128M</small></div>
        </div>  



        <div class="etape">
        <div class="form-group">
        <label for="date_db">Date/heure debut</label>
        <input type="datetime-local" id="ddb" name="date_db"></div>
        <hr>
        <div class="form-group">
        <label for="date_db">Date/heure fin  </label>
        <input type="datetime-local" id="dfn" name="date_fn"></div>
        

                
              </div>

                <div class="etape"><div class="form-group" id="salle_libre"></div>


              </div><!--div reservé pur la creation du <selec> des salles libres--> 

                  <!--<input type="submit" name="envoyer">
                  <br>
                  <button class="btn btn-outline-primary" type="button" id="btn" onclick="salleLibre();">euh</button>-->

                  <div style="overflow:auto;">
                        <div style="float:right;">
                          <button class=" btn btn-outline-danger" type="button" id="prevBtn" onclick="nextPrev(-1)">Precedant</button>
                          <button class=" btn btn-outline-success"type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                        </div>
                  </div>

                </form>

                
              </div>
                   </div>
              <script type="text/javascript" src="js/form.js"></script>

                        </div>
              
                    </div>
                </div>
            </div>
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

<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="js/notif.js" type="text/javascript"></script>

</html>

