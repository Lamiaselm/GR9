<?php
session_start();
try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");
  //$DB-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //echo "conx reussite à la BDD.<br>";

} catch (Exception $e) {
 //  echo " cnx faild  .$e->getmessage()";
}
if (isset($_GET['id']))
$_SESSION['iddem']=$_GET['id'];
if(isset($_POST['idm']))
$_SESSION['iddem']=$_POST['idm'];
if((isset($_SESSION["iddem"]))) { 
  
//*************************************************************************
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="css/photos/logo123.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>info event</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="css/fontawesome/css/all.css">    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
       <style type="text/css"> 
  .dropdown-menu{
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
  </style>
    <style type="text/css">
      

      input {
            outline:none;
            border:none
                  }
    </style>
    
</head>
<body>

    <div class="wrapper"  style="background-image: url(css/photos/birds-cold-conifer-917494.jpg);">
        <div class="sidebar"  data-image="css/photos/sidebar-5.jpg" style="background-image: url(css/photos/sidebar-5.jpg);" data-color='black'style="background-color: black">

     <div class="sidebar-wrapper">
                <div class="logo">
               
                            <?php    
                                                $query="SELECT * FROM accounts where id= ".$_SESSION["id"]."; ";
                                                   if ($result=mysqli_query($DB,$query))
                                                    {
                                                        
                                                                
                                                    
                                                    while ( $row=mysqli_fetch_array($result))

                                                     {
                                                        
                   echo " <img class='img-circle' src=".$row[3] ." width='140' style='margin-left: 40px'> ";
                           echo "<br><br><br>";
                echo "Welcome ".$row[4]; } }
                      ?>
                  
                </div>
                <ul class="nav">
                  
                  
                    <li>
                        <a class="nav-link" href="ajouter.php">
                            <i class="nc-icon nc-simple-add"></i>
                            <p>Ajouter réservation</p>
                        </a>
                    </li>
                             </li>
                    <?php if($_SESSION['id']==1) {?>
                 
                               <li>
                        <a class="nav-link" href="ajouter_compte.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Ajouter compte</p>
                        </a>
                    </li>
                      <li>
                       
                         <a class='nav-link' href=stat.php>

                         
                            <i class="nc-icon    nc-chart-pie-36 "></i>
                            <p>Statistiques </p>
                               </a>
                        
                    </li>
                    <li>
           
                          <a class='nav-link' href=consulter.php>

                      
                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Consulter demande </p>
                        </a>
                    </li>
                  <?php }?>
                
                    <li>
                        <a class="nav-link" href="mes_res.php">
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
                                


                                <button class="btn btn-outline-secondary" id="refresh" onclick="document.location.reload(false)">Rafraichir </button>
                            
                                                                                                                            
                              
                            </li>
                        
                        </ul>
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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="card">
                                        <div class="header text-center">
                                            <br>
                                            <h4 class="title">Détail de la réservation</h4>
                                            <p class="category"></p>
                                            <br>
                                        </div>
                                        <div class="content table-responsive table-upgrade">
                                            <table class="table">
                                                <thead>
                                                    <th></th>
                                                 
                                                </thead>
                                                <tbody>

                                        


                                                      <?php

                                                          
                                  

                                                //*************************************************************************
                                                $query="SELECT * FROM demande WHERE id_demande = ".$_SESSION["iddem"].";";
                                                $cpt=0;
                                            
                                                   if ($result=mysqli_query($DB,$query))
                                                    {
                                                      if($_SESSION['id']!=1)
                                                      {
                                                      $update_query = "UPDATE demande SET Seen_user=1 WHERE id_demande = ".$_SESSION["iddem"].";";
                                                         mysqli_query($DB, $update_query);  
                                                      }else{
                                                        $update_query = "UPDATE demande SET Seen=1 WHERE id_demande = ".$_SESSION["iddem"].";";
                                                         mysqli_query($DB, $update_query);

                                                      }   

                                                        
                                                                
                                              
                                                    while ( $row=mysqli_fetch_array($result)) {
                                                          # code...
                                                       $etat='';
                                                        if ($row[14]==0)
                                                        {
                                                          $etat='En attente ';
                                                        }else
                                                        {
                                                          if($row[14]==2)
                                                           { 
                                                            $etat='<i class="fa fa-times text-danger">'; 
                                                           }else
                                                            { if($row[14]==1){
                                                              $etat='<i class="fa fa-check text-success">'; 
                                                              }else{
                                                                $etat=' &nbsp;<i id="edit" class="fa fa-edit">';
                                                              }
                                                            }
                                                            
                                                        }

                                                           
                                                 //   print($_SESSION['iddem']);
  ?>
                                                 
                                                  <?php if (($_SESSION["id"]==1)&&($row[14]==0)&& ($_SESSION["id"]==$row[13]))
                                                  echo ""?> <tr><td> <form id='frmlr' method='post' action='modifier.php' value='data'>
                                                          &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input id='r' type='hidden' class='btn btn-round btn-fill btn-info' value='annuler modification' onclick='document.location.reload(false)'> &nbsp; &nbsp;&nbsp; &nbsp; <input id='s' type='hidden' class='btn btn-round btn-fill btn-info' value='sauvegarder'  name='sauv' onclick='sauve();'>   </tr></td> 
  <tr><td>Nom du club  : <input type="text" name="club" id="1" value="<?php echo $row[8];?>" readonly> </td> </tr> 
  <td> Nom de l événement:<input type="text" name="event" id="2" value="<?php  echo $row[9];?>" readonly></td></tr> 
  <tr>  <td> Date / heure  début de lévénement :<input name="ddb" type="text" id="3" onchange="salleLibre(this.value,document.getElementById('4').value);" value="<?php  echo $row[5];?>" readonly></td> </tr> 
  <tr>  <td> Date / heure fin  de lévénement :<input name="dfn" type="text" id="4" onchange="salleLibre(document.getElementById('3').value,this.value);"value="<?php  echo $row[6];?>" readonly></td> </tr> 
  <tr>  <td> Description de lévénement :<input name="descp" type="text" id="9" value="<?php  echo $row[10];?>" readonly></td></td> </tr>
   <tr>  <td> Fiche technique / demande salles  : <a href="<?php echo $row[7];?>" target='_blank' <i class='nc-icon nc-attach-87' ;></td> </tr> 
   <tr>  <td> Nom de létudiant  :<input type="text" name="nom" id="5" value="<?php  echo $row[1];?>" readonly></td> </tr>
    <tr>  <td> Prénom de létudiant :<input type="text" name="prenom" id="6" value="<?php  echo $row[2];?>" readonly></td> </tr> <tr>  <td> Matricule :<input type="text" name="matricule"id="7" value="<?php  echo $row[4];?>" readonly></td> </tr> 
    <tr> <td> Salles demandées : <?php

                                                        $sql0="SELECT salle FROM salle_demande WHERE (id_demande=$row[0])";
                                                  $req8= mysqli_query($DB,$sql0) or die ('Erreur SQL !<br />'.$sql0.'<br />'.mysqli_error($DB));
                                                  $cpt=1;
                                                  $t=array();
                                                  while($data1=mysqli_fetch_array($req8))
                                                  {
                                                    $sql3= "SELECT nom_salle FROM salle WHERE id_salle=".$data1['salle'].";";
                                                    $req0 =mysqli_query($DB,$sql3) or die ('Erreur SQL !<br />'.$sql3.'<br />'.mysqli_error($DB));
                                                    
                                                    
                                          
                                                    while ( $data2=mysqli_fetch_array($req0)) { 
                                                      
                                                      array_push($t,$data2['0'] );

                                                    ?>
                                                       <input type="text" id="salle<?php echo $cpt;?>" value="<?php echo $data2['nom_salle'];?>" readonly>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td></tr> <tr><td>   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        

                                                        <?php $cpt++;
                                                        }
                                                        


                                                     
                                                        
                                                      
                                


                                                    
                                                     
                                                   
                                                    

                                                  }
                                                    ?>
                                                    <select type="hidden" id="slct"></select>
                                                    <input type="hidden"  id="taillei" value="<?php echo $cpt;?>">
                                                    

                                                    
                                            
                                                  <tr><td> Niveau détude : <input type="text" id="8" name="annee" value="<?php  echo $row[3];?>" readonly></td> </tr> <tr><td>Etat de la demande :<?php echo $etat ;?></td></tr>
                                                  </form>   
                                                  <?php   
                                                    if (($_SESSION["id"]==1)&&(($row[14]==0)||($row[14]==3)))
                                                       {
                                                    echo "<form method='post'>
                                                    <th class='text-center'> <tr class='text-center'> <td class='text-center'>  
                                                     <input  class='btn btn-round btn-fill btn-info' type='submit' name='submit' value='accepter' </i>   ";

                                                     echo "&nbsp; &nbsp;";

                                              
                                             
                                                    echo" <input class='btn btn-round btn-fill btn-info' <i class='fa fa-times  text-danger' type='submit' name='submit2' value='Refuser'>
                                                    </form>";
                                            

                                                      }
                                                    

                                                                
                                                               
                                                 if((int) substr($row[5], 5,2)-(int) date('m') >= 0 && (int) substr($row[5], 8,2)-(int) date('d') > 7 && (($row[14]==0)||($row[14]==3)))
                                                { echo "  <th><td> <input id='m' class='btn btn-round btn-fill btn-info' value='modifier' onclick='modifier();'></td> </tr> </th>";
                                                }

                                                         
                                                          if (isset($_POST['submit']))
                                                          { 
                                                        
                                                          $to = "hl_selmane@esi.dz";
                                                       $subject = "Demande de résérvation acceptée";
                                                       $txt = "Le service culturel de l'ESI a le plaisir de vous annoncer que votre demande de résérvation a été  acceptée                                                      
                                                                                     Le détail de votre résérvation :                                
                                                                                     Le nom du Club : ".$row[8]."   
                                                                                     Le nom de l'événement : " .$row[9]."    
                                                                                     Date / heure  début de l'événement : ".$row[5]."   
                                                                                     Date / heure  fin  de l'événement  : ".$row[6]."
                                                                                     Salles : ".join('/',$t)."
          
                                                                                     Cordialement .";

                                                 
                                               
                                                
                                             
                                                       $headers = "From: bin";
                                           if ( mail($to,$subject,$txt,$headers)) { echo '<div class="alert alert-success">Votre mail a été envoyé , veuillez verifier votre boite </div>';
                                                   # code...
                                               } else {echo '<div class="alert alert-danger">Echec d envoi de mail , veuillez vérifier votre connexion </div>';}   
                                                      $sql="SELECT salle FROM salle_demande WHERE (id_demande=$row[0])";
                                                  $req7= mysqli_query($DB,$sql) or die ('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($DB));
                                                  while($data=mysqli_fetch_array($req7))
                                                  {
                                                    $sql2= "INSERT INTO planning_s2 VALUES ('{$data['salle']}','{$row[5]}','{$row[6]}')";
                                                    $req =mysqli_query($DB,$sql2) or die ('Erreur SQL !<br />'.$sql2.'<br />'.mysqli_error($DB));

                                                  }





                                          


                                               $upda= "UPDATE `demande` SET `etat_demande` = '1',`Seen_user` = '0' WHERE `demande`.`id_demande` =".$_SESSION["iddem"].";";

                                               
                                              if ($result1=mysqli_query($DB,$upda)) { //echo "haha  ";
                                            }
                                                            
                                                          }

                                                          
                                                            
                                                          }
                                                     


                                                              if (isset($_POST['submit2']))
                                                          { 
                                                            $upda1= "UPDATE `demande` SET `etat_demande` = '2',`Seen_user` = '0'  WHERE `demande`.`id_demande` =".$_SESSION["iddem"].";";
                                                            
                                                            if ($result2=mysqli_query($DB,$upda1)) { //echo "lol ";
                                                          }

                                                         // echo "ddfddv";
                                                          $to = "hl_selmane@esi.dz";
                                                       $subject = "Demande de résérvation refusée ";
                                                       $txt = "Le service culturel de l'ESI  a le regret de vous annoncer que votre demande de résérvation a ete refusée , pour plus d'information veuillez vous apprrochez du bureau de notre service situé à la DE 
                                                                                         Merci de votre compréhension 
                                                                                         Cordialement . ";
                                                       $headers = "From: bin";
                                                if ( mail($to,$subject,$txt,$headers)) { $upda1= "UPDATE `demande` SET `etat_demande` = '2' WHERE `demande`.`id_demande` =".$_SESSION["iddem"].";";
                                                 echo '<div class="alert alert-success">Votre mail a été envoyé , veuillez verifier votre boite </div>';
                                                   # code...
                                               } else {echo '<div class="alert alert-success">Votre mail a été envoyé , veuillez verifier votre boite </div>';}   
                                                            

                                                          }

                                                            
                                                          
                                           
                                              
                                   

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

                        </div>
                    </div>

                 
 <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="home.html" target="_blank">
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
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

<script>
var salle =['AP1','AP2','A1','A2','A3','A4','CP1','CP2','CP3','CP4','CP5','CP6','CP7','CP8','CP9','S4','S4B','S5','S6','S7','S8','S9','S10','S11','S12','S13','S14','S15','S16','S17','S18','S19','S20','S21','AUD','BIB','CYB','SCBP']; //table des salles 
 function epuration(t) //fonction d'epuration d'un tableau pour supprimer les isions 
    {
      var tab =[];
      for(var i=0;i<t.length;i++)
      {
        if(tab.indexOf(t[i])==-1)
        {
          tab.push(t[i]);
        }
      }

      return tab;

    }

    function differance(t) //permet de creer la differance entre un tableau et le tableau de salle
    {
      var deff = [];
      for (var i = 0; i < salle.length; i++) {
        if (t.indexOf(salle[i]) === -1) {
          deff.push(salle[i]);
        }
      }
      return deff;
    }

    function selectSl(t)//permert de creer un select a partir d'un tableau 
    {
      exist=document.getElementById('slct');
      if(exist!=null)
        {var vider=$('#slct');
      vider.empty();}
      exist.removeAttribute("type");
      var selectList = exist;
      selectList.id = "slct";
      selectList.setAttribute("multiple","multiple");
      selectList.setAttribute("name","select[]");
      for (var i = 0; i < t.length; i++) {
        var option = document.createElement("option");
        option.value = salle.indexOf(t[i])+1;
        option.text = t[i];
        selectList.appendChild(option);
      }
      
    }
    function salleLibre(ddb,dfn)//permet d'afficher les salles libre dans un intervalle !!
    {
      
      if (ddb) {if (dfn) {
      if(ddb<=dfn)
        {return $.ajax({
          method: 'POST',
          url: 'sl.php',
          data: {'debut':ddb  , 'fin': dfn,'ajax': true},
          success: function(data){
            selectSl(differance(epuration(data.sort())));
          },
          dataType:"json"
        });}}}
    }


  modifier =function(){
    document.getElementById('s').removeAttribute("type");
    document.getElementById('r').removeAttribute("type");
    var ddb=document.getElementById('3').value;
    var dfn=document.getElementById('4').value;
    var euh= document.getElementById('m');
    euh.parentNode.removeChild(euh);
    var taille =document.getElementById('taillei').value;
    for(var i=1;i<=9;i++)
    document.getElementById(i).removeAttribute("readonly");
    for(var i=1;i<=taille-1;i++)
      {document.getElementById('salle'+i).type="hidden";}
  
        salleLibre(ddb,dfn);
    }


  sauve= function()
  {
   
    document.getElementById('slct').setAttribute('type','hidden');
    document.getElementById('frmlr').submit();}


</script>
<script src="js/notif.js" type="text/javascript"></script>

<?php
    }    //*************************************************************************
?>
