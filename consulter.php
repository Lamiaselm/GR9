<?php
session_start();
try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");


} catch (Exception $e) {
 
} 

if (!isset($_SESSION['loggedin'])) 
        header("Location: login.php");


?>

<?php if($_SESSION['id']==1){?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="css/photos/logo123.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Consulter réservation</title>
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
        <style type="text/css"> 
  .dropdown-menu{
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
  </style>
</head>

<body>
  

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
                     <!--  <li>
                        <a class="nav-link" href="visualiser_date.php">
                            <i class="nc-icon nc-simple-add"></i>
                            <p>Visualizer planning</p>
                        </a>
                    </li>-->
                        
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
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Tableau des demandes de réservations </h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                           
                                                    <th>ID</th>
                                                    <th>Club</th>
                                                    <th>Evénement</th>
                                                     <th>Etat</th>
                                                    <th>Consulter</th>
                                                   
                                        </thead>
                                        <tbody>
                                          
                       
                                                      <?php
                                                     
                     
                                         
                                                $query="SELECT * FROM demande ";
                                                   if ($result=mysqli_query($DB,$query))
                                                    {
                                                        
                                                                
                                                    
                                                    while ( $row=mysqli_fetch_array($result))

                                                     {
                                                      $etat='';
                                                        if ($row[14]==0)
                                                        {
                                                          $etat='<i class="fa fa-spinner">';
                                                        }else
                                                        {
                                                          if($row[14]==2)
                                                           { 
                                                            $etat='<i class="fa fa-times text-danger">'; 
                                                           }else
                                                            { if($row[14]==1){
                                                              $etat='<i class="fa fa-check text-success">'; 
                                                              }else{if($row[14]==3){$etat=' &nbsp;<i id="edit" class="fa fa-edit">';}

                                                                
                                                              }
                                                            }
                                                            
                                                        }
                                                    



                                                            echo "<tr>";  
                                                                   
                                                                    if ($row[13]==1)
                                                                    {
                                                                   echo"<td><i id='star' class='fa fa-star'></i></td>";
                                                                    echo"   <td>".$row[8]."</td> <td>".$row[9]."</td>
                                                                    <td>".$etat."</td>
                                                                    <td> <a <i class='nc-icon nc-stre-right' id=".$row[0]." onclick='iddem(this.id,\"frm\",\"i1\")'>
                                                                  </td>
                                                                </tr>";
                    		          echo "<form id='frm' method='post' action='info.php'><input id='i1' name='idm' type='hidden' value=".$row[0]."/></form>";
                                                               			} 


                                                                  
                                                
                                                                	
                                                
                                                     
                                                      }   
                                                  } 
                                                  	


                                                         $query10="SELECT * FROM demande WHERE id_user<>1";
                                                   if ($result10=mysqli_query($DB,$query10))
                                                    {
                                                       

                                                                    
                                                    
                                                    while ( $row10=mysqli_fetch_array($result10))
                                                    {
                                                      $etat='';
                                                        if ($row10[14]==0)
                                                        {
                                                          $etat='<i class="fa fa-spinner">';
                                                        }else
                                                        {
                                                          if($row10[14]==2)
                                                           { $etat='<i class="fa fa-times text-danger">'; }else { $etat='<i class="fa fa-check text-success">';  }
                                                         if($row[14]==3){$etat=' &nbsp;<i &nbsp;<i id="edit" class="fa fa-edit">';}

                                                                
                                                              
                                                        }

                                                       echo"<td><i class='fa fa-star'></i></td>";
                                                                    echo"   <td>".$row10[8]."</td> <td>".$row10[9]."</td>
                                                                    <td>".$etat."</td>
                                                                    <td> <a <i class='nc-icon nc-stre-right' id=".$row10[0]." onclick='iddem(this.id,\"frm10\",\"i2\")'>  </td>
                                                                </tr>";
                                                               
                                                                
                                                                  echo "<form id='frm10' method='POST' action='info.php'><input id='i2'name='idm' type='hidden' value=".$row10[0]."/></form>";
                                                                
                                                    }
                                                  
                                                  }




                                                  if ($_SESSION['id']!=1)
                                                    {
                                                        echo '<script type="text/javascript">
                                                        Document.getElementById("lol").style.display="none";
                                                    </script>';
                                                    }
                                                ?>
                                          
                                          
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
<?php } else { header("Location: mes_res.php");}?>
