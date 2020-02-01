<?php
session_start();
$idb=$_SESSION['id'];


//fetch.php;
if(isset($_POST["view"]))
{
 $connect=mysqli_connect("localhost","root","","gestion_des_salles");

 if($idb!=1)
  {
 $query = "SELECT * FROM demande WHERE ((etat_demande!=0) AND (id_user=".$idb.")) ORDER BY id_demande DESC";
 $result = mysqli_query($connect,$query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  { if($row["Seen_user"]==0)
      {
        $output.='<li style="background-color:#dcdcdc;">';
      }else{$output.='<li>';}
      if($row["etat_demande"]==1)
      {
   $output .= '
   
    <a href=./info.php?id='.$row[0].'&idbb='.$idb.' target="_blank">
     <strong>votre demande a été acceptée </strong><br/>
     
     
    </a>
   </li>
   <li class="divider"></li>
   ';
    }else
    {
      if($row["etat_demande"]==2){
      $output .= '
   
    <a href=./info.php?id='.$row[0].'&idbb='.$idb.' target="_blank">
     <strong>votre demande a été réfusée </strong><br/>
    </a>
   </li>
   <li class="divider"></li>
   ';
      }else{
         $output .= '
   
    <a href=./info.php?id='.$row[0].'&idbb='.$idb.' target="_blank">
     <strong>votre demande a été modifiée </strong><br/>
    </a>
   </li>
   <li class="divider"></li>
   ';
      }
    }
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM demande WHERE ((Seen_user=0)&&(etat_demande!=0)&&(id_user=".$idb."))";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
else
{
$query = "SELECT * FROM demande ORDER BY id_demande DESC";
 $result = mysqli_query($connect,$query);
 $output = '';
 
  if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  { if($row["Seen"]==0)
      {
        $output.='<li style="background-color:#dcdcdc;">';
      }else{$output.='<li>';}
   $output .= '
   
    <a href=./info.php?id='.$row[0].'&idbb='.$idb.' target="_blank">
     <strong>'.$row["club"].'</strong><br />
     <small><em>'.$row["event"].'</em></small>
     <p style = "display : none;">'.$row["Seen"].'</p>
    </a>
   </li>
   <li class="divider"></li>
   ';

  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 $query_1 = "SELECT * FROM demande WHERE Seen=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
}
?>