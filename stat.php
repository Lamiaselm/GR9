<?php
session_start();
try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");


} catch (Exception $e) {
 
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="css/photos/logo123.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Statistiques</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
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
                    </li>
                       <li>
                          
                         <a class='nav-link' href="mes_res.php"> 

                       
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Mes réservations</p>
                        </a>
                         </li>
                           <li>
                            
                   
                          <a class='nav-link' href="consulter.php">

                  
                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Consulter demande  </p>
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
                                <a href="#" class="oggle nav-link" >
                                    <i class="nc-icon nc-bell-55"></i>
                                   
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <button class="btn btn-default btn-lg" id="refresh" onclick="document.location.reload(false)">Rafraichir </button>
                                                                                   
                              
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
                            <div class="card " id="circle">
                                <div class="card-header ">
                                    <h4 class="card-title">Taux d'organisation d'événement</h4>
                                    <p class="card-category">Pourcentage des événéments organisés par chaque club</p>
                                </div>
                                <div class="card-body ">
                                    <iframe width="700" height="600" src="chart.php"></iframe>
                                </div>
                                <div class="card-footer ">
                                 <!--   <div class="legend">
                                        <i class="fa fa-circle text-info" ><a href="graphe.php">open</a></i> 
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>-->
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Taux de résérvation pour chaque salle </h4>
                              
                                </div>
                                <div class="card-body ">
                                           <iframe width="700" height="600" src="baton.php"></iframe>
                                </div>
                                <div class="card-footer ">
                               
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Taux d'organisation d'événement par chaque club dans une periode donnée</h4>
                                
                                </div>
                                <div class="card-body ">
                                    <iframe width="700" height="600" src="baton1.php"></iframe>
                                </div>
                                <div class="card-footer ">
                                  
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> 
                                    </div>
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
                            <a href="Home.html">Home</a>
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
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

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