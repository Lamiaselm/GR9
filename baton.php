<?php  
 $connect = mysqli_connect("localhost", "root", "", "gestion_des_salles");  
 $query = "SELECT * FROM salle";

 $result = mysqli_query($connect, $query);  
 foreach ($result as $salle) {
 	 $query2 = "SELECT * FROM salle_demande where salle=".$salle['id_salle'].";";
 	  $result2 = mysqli_query($connect, $query2); 
               $cnt=$salle["nom_salle"];
				$count = mysqli_num_rows($result2);
				$lm[$cnt]=$count;
 }

 ?>  
 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Salle', 'Nombre de demande'],
          <?php
                        foreach ($lm as $key => $value) 
                          
                          {  
                               echo "['".$key."', ".$value."],";  
                          }  
          ?>
          
        ]);

        var options = {
          chart: {
          
            
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1500px; height: 800px;"></div>
  </body>
</html>




