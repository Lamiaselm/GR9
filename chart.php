<?php  
include('circle.php'); 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>circle</title> 
      
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">

           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['user', 'Number'],  
                          <?php  
                         foreach ($lm as $key => $value) 
                          
                          {  
                               echo "['".$key."', ".$value."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Pourcentages des demande acceptées par club',  
                      //is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  

           <br /><br />  
           <div style="width:900px;">  
               <!-- <h3 align="center">Si  &nbsp;ط     </h3>  -->
                <br />  
                <div id="piechart" style="width: 900px; height: 500px; float: right;"></div>  
           </div>  
      </body>  
 </html>  
