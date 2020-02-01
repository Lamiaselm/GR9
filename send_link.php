<?php


if(isset($_POST['submit_email']) && $_POST['email'])
{ 
$email= $_POST['email'];
//echo $email;


try {
  $DB=mysqli_connect("localhost","root","","gestion_des_salles");
 
 // echo "conx reussite à la BDD.<br>";

} catch (Exception $e) {
  //echo " cnx faild  .$e->getmessage()";
}


  $query="SELECT * from accounts where user='$email'";
    if ($result=mysqli_query($DB,$query))
     { 
        
         while ( $row=mysqli_fetch_array($result)) {
         
      $email=$row['user'];/***************************************/
      $pass=md5($row['passwrd']);
    

    }


    $link="http://localhost/prjectzo/reset_pass.php?key=".$email."&reset=".$pass.">Click To Reset password";
                                                       $to = $email;
                                                       $subject = "Reset ur password";
                                                       $txt = "checkez ce lien ".$link ;
                                                       $headers = "From: bin";
                                                         if ( mail($to,$subject,$txt,$headers)) { echo '<div class="alert alert-success">Un mail de confirmation vous a été envoyé , veuillez vérifier votre boite mail!</div>   ';
                                                              # code...
     
}
}
?>