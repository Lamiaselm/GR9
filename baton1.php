
<?php  
if(isset($_POST["vv"]))
{
  $db=$_POST["date_db"];
  $df=$_POST["date_fn"];
 $connect = mysqli_connect("localhost", "root", "", "gestion_des_salles");  
 $query = "SELECT * FROM accounts;";

 $result = mysqli_query($connect, $query);  
 foreach ($result as $user) {
  $query2 = "SELECT * FROM demande WHERE ( date_db BETWEEN '{$db}' AND '{$df}') AND (id_user=".$user['id'].");" ;
      if($result2=mysqli_query($connect,$query2))
      {    

         $cnt=$user["username"];
        $count = mysqli_num_rows($result2);
        $lm[$cnt]=$count;
        $b=1;
        
      } 
   
  }

 }
 ?> 
<!DOCTYPE html>
<html lang="en">

    <head>

    
        <title></title>

        <!-- CSS -->
       
        <link rel="stylesheet" href="css/bootstrap.css">
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
       
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content" >
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                        <form  method="POST" role="form"  enctype="multipart/form-data" >

                                <div class="form-group">
                                    <label for="dtp_input1" class="control-label">Date/Heure debut</label>
                                        <div class="input-group date form_datetime " data-date="0" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1" id="dateDebut">

                                    <button class="btn btn-outline-danger" disabled> <i class="fas fa-calendar-alt"></i></button>
                                    <input class="form-control" size="16" type="text" value="" readonly  name="date_db" id="dateStart">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                                </div>
                                <div class="form-group">
                                   <div class="form-group">
                                      <label for="dtp_input1" class="control-label">Date/Heure fin</label>

                                         <div class="input-group date form_datetime " data-date="0" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1" id="dateFin" >
                                              <button class="btn btn-outline-danger" disabled> <i class="fas fa-calendar-alt"></i></button>
                                              <input class="form-control" size="16" type="text" value="" readonly  name="date_fn">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                         </div>
                                          <input type="hidden" id="dtp_input1" value="" /><br/>
                                     </div>
                                </div>
                                <input type="submit" name="vv">
                        </form>
                        <div id="columnchart_material" style="width: 1000px; height: 500px;"></div>
                         </div>
                    </div>
                </div>
                    
            </div>
        
        
        <!-- Javascript -->
       <script src="js/jquery-2.1.4.min.js"></script>
       <script type="text/javascript" src="js/bootstrap.js" charset="UTF-8"></script><!--bootstrap -->

    <script type="text/javascript" src="js/moment-with-locales.js"></script><!--moment.js -->
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    
    <script defer src="js/all.js"></script>
    


<script type="text/javascript">
    
    $('.form_datetime').datetimepicker({
        language:  'fr',
        weekStart: 0,
        todayBtn:  1,
        autoclose: 1,
        minuteStep: 10,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        keyboardNavigation:1,
        showMeridian: 1
    });
   

</script>

        <!-- chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
      

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['user', 'Nombre de demande'],
          <?php
                        foreach ($lm as $key => $value) 
                          
                          {  
                               echo "['".$key."', ".$value."],";  
                          }  



          ?>
          
        ]);

        var options = {
          chart: {
            title: 'Nombre des événements organisés par les clubs  ',
            subtitle: 'Dans une période donnée ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

        <?php if ($b==1)
      {
        echo("google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);");
      }  ?>
    </script>
        
    </body>

</html>