<?php 
include 'connect.php';

//Searching the occuppied classrooms
function rech($debut,$fin)
{
	global $mysql;
	$sql = "SELECT planning_s2.id_salle,salle.id_salle ,salle.nom_salle FROM planning_s2 JOIN salle on salle.id_salle = planning_s2.id_salle WHERE (date_db >= '$debut' AND date_fn <= '$fin') OR (date_db <= '$debut' AND date_fn >= '$debut' AND date_fn <= '$fin' ) OR (date_db >= '$debut' AND date_fn >= '$fin' AND date_db <= '$fin') OR (date_db <= '$debut' AND date_fn >= '$fin')  ";
	/*SELECT table1.* 
	FROM table1 t1 
      LEFT JOIN table2 t2 
           ON t1.id_client = t2.id_client AND t1.id_article = t2.id_article 
           WHERE t2.id_client IS NULL  */
           $sql1 = "SELECT salle.id_salle,salle.nom_salle FROM salle";
           $req = mysqli_query($mysql,$sql) or die ('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($mysql)); 
    // on va scanner tous les tuples un par un
    //echo 'liste des salles occupés :'.'<br />';
           $cmp=1;
           $salles = array();
           while ($data = mysqli_fetch_array($req)) {
		// on affiche les résultats
           	$salles[]=$data;
           }
           $salle=array();	
           foreach ($salles as $euh) {
           	$salle[] = $euh['nom_salle'];
           }

	//extract($salles);
           

           
           return $salle;	}
	//WHERE STR_TO_DATE('2007-02-11','%Y-%m-%d') BETWEEN dd AND df
	//OR STR_TO_DATE('2007-02-17','%Y-%m-%d') BETWEEN dd AND df AND b_id =2 LIMIT 0 , 30	
           ?>
           