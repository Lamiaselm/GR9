<?php 

include("connect.php");
$lm;
$cnt;
$req1="SELECT * FROM accounts";
$req2="SELECT * FROM demande WHERE (etat_demande=1)";
$count2=0;
	if($result=mysqli_query($mysql,$req2))
			{	
				$count2= mysqli_num_rows($result);				
			}

if($result=mysqli_query($mysql,$req1))
{
	foreach ($result as $user)
{
    $req="SELECT * FROM demande WHERE (etat_demande=1)AND (id_user=".$user['id'].")";
		if($result=mysqli_query($mysql,$req))
			{	   

				$cnt=$user['username'];
				$count = (mysqli_num_rows($result)*100)/$count2;
				$lm[$cnt]=$count;
				
			}
		else
			{
				echo"erreur u-u";
			}
}

}          else
			{
				echo	"erreur1 Q....Q";
			}
			
			





 ?>